<?php
class SendGridHelper extends AppHelper {

    public $helpers = array('Html');

    public $mapEventIcons = array(
        'processed' => 'fa fa-gears',
        'dropped' => 'fa fa-trash-o',
        'delivered' => 'fa fa-inbox',
        'deferred' => 'fa fa-thumbs-o-down',
        'bounce' => 'fa fa-exclamation-triangle',
        'open' => 'fa fa-folder-open',
        'click' => 'fa fa-hand-o-up',
        'spam' => 'fa fa-fire',
        'unsubscribe' => 'fa fa-chain-broken',
    );

    public function showEvents($sendGridEvents){
        $out = array();
        foreach ($sendGridEvents as $sendGridEvent) {
            $title = '';
            switch ($sendGridEvent['SendGridEvent']['event']) {
                case 'processed':
                    $title = __d('SendGrid', 'Message has been received and is ready to be delivered.');
                    break;

                case 'dropped':
                    $title = __d('SendGrid', 'Invalid SMTPAPI header, Spam Content (if spam checker app enabled), Unsubscribed Address, Bounced Address, Spam Reporting Address, Invalid');
                    $title .= "\nReason: " . $sendGridEvent['SendGridEvent']['reason'];
                    break;

                case 'delivered':
                    $title = __d('SendGrid', 'Message has been successfully delivered to the receiving server.');
                    $title .= "\nResponse: " . $sendGridEvent['SendGridEvent']['useragent'];
                    break;

                case 'deferred':
                    $title = __d('SendGrid', 'Recipient’s email server temporarily rejected message.');
                    $title .= "\nResponse: " . $sendGridEvent['SendGridEvent']['useragent'];
                    $title .= "\nAttempt: " . $sendGridEvent['SendGridEvent']['ip'];

                    break;

                case 'bounce':
                    $title = __d('SendGrid', 'Receiving server could not or would not accept message.');
                    $title .= "\nStatus: " . $sendGridEvent['SendGridEvent']['status'];
                    $title .= "\nReason: " . $sendGridEvent['SendGridEvent']['reason'];
                    $title .= "\nType: " . $sendGridEvent['SendGridEvent']['type'];
                    break;

                case 'open':
                    $title = __d('SendGrid', 'Recipient has opened the HTML message.');
                    $title .= "\nUser Agent: " . $sendGridEvent['SendGridEvent']['useragent'];
                    $title .= "\nIp: " . $sendGridEvent['SendGridEvent']['ip'];
                    break;

                case 'click':
                    $title = __d('SendGrid', 'Recipient clicked on a link within the message.');
                    $title .= "\nUser Agent: " . $sendGridEvent['SendGridEvent']['useragent'];
                    $title .= "\nIp: " . $sendGridEvent['SendGridEvent']['ip'];
                    $title .= "\nUrl: " . $sendGridEvent['SendGridEvent']['url'];
                    break;

                case 'spamreport':
                    $title = __d('SendGrid', 'Report Recipient marked message as spam.');
                    $title .= "\nUser Agent: " . $sendGridEvent['SendGridEvent']['useragent'];
                    $title .= "\nIp: " . $sendGridEvent['SendGridEvent']['ip'];
                    break;

                case 'unsubscribe':
                    $title = __d('SendGrid', 'Recipient clicked on message’s subscription management link.');
                    $title .= "\nUser Agent: " . $sendGridEvent['SendGridEvent']['useragent'];
                    $title .= "\nIp: " . $sendGridEvent['SendGridEvent']['ip'];
                    break;
            }

            $out[] = $this->Html->tag('i', '', array(
                'class' => $this->mapEventIcons[$sendGridEvent['SendGridEvent']['event']],
                'title' => $title
            ));
        }

        return implode('', $out);
    }

}
