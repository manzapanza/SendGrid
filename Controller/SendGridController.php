<?php
App::uses('SendGridAppController', 'SendGrid.Controller');
// App::uses('IncomingEmail', 'SendGrid.Model');
// App::uses('Event', 'SendGrid.Model');

class SendGridController extends SendGridAppController {

    public $name = 'SendGrid';

    public $uses = array(
        'SendGrid.SendGridIncomingEmail',
        'SendGrid.SendGridEvent'
    );

    public $components = array('RequestHandler');

    public function inbound_parse_webhook($secretKeyString = null){
        $this->layout = false;
        if($this->request->is('post') && $secretKeyString === Configure::read('SendGrid.secretKeyStr')){

            // $headers = $this->request->data['headers'];
            // $text = $this->request->data['text'];
            // $html = $this->request->data['html'];
            // $from = $this->request->data['from'];
            // $to = $this->request->data['to'];
            // $cc = $this->request->data['cc'];
            // $subject = $this->request->data['subject'];
            // $dkim = $this->request->data['dkim'];
            // $SPF = $this->request->data['SPF'];
            // $envelope = $this->request->data['envelope'];
            // $charsets = $this->request->data['charsets'];
            // $spam_score = $this->request->data['spam_score'];
            // $spam_report = $this->request->data['spam_report'];
            // $attachments = $this->request->data['attachments'];

            $incomingEmail = array(
                'IncomingEmail' => array(
                    'headers' => $this->request->data['headers'],
                    'text' => $this->request->data['text'],
                    'html' => $this->request->data['html'],
                    'from' => $this->request->data['from'],
                    'to' => $this->request->data['to'],
                    'cc' => $this->request->data['cc'],
                    'subject' => $this->request->data['subject'],
                    'dkim' => $this->request->data['dkim'],
                    'SPF' => $this->request->data['SPF'],
                    'envelope' => $this->request->data['envelope'],
                    'charsets' => $this->request->data['charsets'],
                    'spam_score' => $this->request->data['spam_score'],
                    'spam_report' => $this->request->data['spam_report'],
                    'attachments' => $this->request->data['attachments'],
                )
            );

            //pr($incomingEmail);

            if(!$this->SendGridIncomingEmail->save($incomingEmail)){
                throw new NotFoundException(__d('SendGrid', 'Incoming Email not saved!'));
            }

        }else{
            throw new BadRequestException(__d('SendGrid', 'Bad Request'));
        }
        $this->render(false);
    }

    public function event_webhook($secretKeyString = null){

        $this->layout = false;

        if($this->request->is('post') && $secretKeyString === Configure::read('SendGrid.secretKeyStr') && $this->request->input('json_decode')){

            $eventFields = array(
                'event',
                'email',
                'smtp-id',
                'useragent',
                'ip',
                'response',
                'attempt',
                'url',
                'status',
                'reason',
                'type',
            );

            if(Configure::read('SendGrid.logInputData')){
                CakeLog::write('info', $this->request->input(), array('sendgrid_event_webhook'));
            }

            $findUniqueArguments = Configure::read('SendGrid.findUniqueArguments');
            $dataEvents = $this->request->input('json_decode');

            foreach ($dataEvents as $dataEvent) {

                $event = array();
                $eventUniqueArguments = array();
                $eventCategories = array();

                foreach ($eventFields as $field) {
                    if(property_exists($dataEvent, $field)){
                        $event['Event'][$field] = $dataEvent->$field;
                    }
                }

                foreach ($findUniqueArguments as $uniqueArgument) {
                    if(property_exists($dataEvent, $uniqueArgument)){
                        $eventUniqueArguments[] = array(
                            'name' => $uniqueArgument,
                            'value' => $dataEvent->$uniqueArgument
                        );
                    }
                }

                if(count($eventUniqueArguments)){
                    $event['EventUniqueArgument'] = $eventUniqueArguments;
                }

                if(property_exists($dataEvent, 'category')){
                    if(is_array($dataEvent->category)){
                        foreach ($dataEvent->category as $category) {
                            $eventCategories[] = array(
                                'category' => $category
                            );
                        }
                    }else{
                        $eventCategories[] = array(
                            'category' => $dataEvent->category
                        );
                    }
                    $event['EventCategory'] = $eventCategories;
                }

                if(property_exists($dataEvent, 'newsletter')){
                    $event['Event']['newsletter_user_list_id'] = $dataEvent->newsletter->newsletter_user_list_id;
                    $event['Event']['newsletter_id'] = $dataEvent->newsletter->newsletter_id;
                    $event['Event']['newsletter_send_id'] = $dataEvent->newsletter->newsletter_send_id;
                }

                if(!empty($event)){
                    if(!$this->SendGridEvent->saveAll($event)){
                        throw new CakeException(__d('SendGrid', 'Events not saved!'));
                    }
                }
            }

        }else{
            throw new BadRequestException(__d('SendGrid', 'Bad request'));
        }
        $this->render(false);
    }

}