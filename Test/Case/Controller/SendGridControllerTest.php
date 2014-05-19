<?php
App::uses('SendGridController', 'SendGrid.Controller');
App::uses('Event', 'SendGrid.Model');

class SendGridControllerTest extends ControllerTestCase {

    public $plugin = 'SendGrid';

    public $fixtures = array(
        'plugin.send_grid.event',
        'plugin.send_grid.event_category',
        'plugin.send_grid.event_unique_argument',
        'plugin.send_grid.incoming_email',
    );

    public function setUp() {

        $this->Event = ClassRegistry::init('SendGrid.Event');
        $this->Event->EventCategory = ClassRegistry::init('SendGrid.EventCategory');
        $this->Event->EventUniqueArgument = ClassRegistry::init('SendGrid.EventUniqueArgument');

        Configure::write('SendGrid.secretKeyStr', '-test-secret-key-');
        Configure::write('SendGrid.findUniqueArguments', array(
            'userid',
            'template',
            'uid',
            'purchase',
            'sg_event_id',
            'sg_message_id',
            'id'
        ));

        parent::setUp();
    }


    public function testEventWebhook() {

        // From: https://sendgrid.com/docs/API_Reference/Webhooks/event.html

        // Example Event POST example

        $data = '[{
            "email": "john.doe@sendgrid.com",
            "timestamp": 1337197600,
            "smtp-id": "<4FB4041F.6080505@sendgrid.com>",
            "event": "processed"
        },
        {
            "email": "john.doe@sendgrid.com",
            "timestamp": 1337966815,
            "category": "newuser",
            "event": "click",
            "url": "http://sendgrid.com"
        },
        {
            "email": "john.doe@sendgrid.com",
            "timestamp": 1337969592,
            "smtp-id": "<20120525181309.C1A9B40405B3@Example-Mac.local>",
            "event": "processed"
        }]';

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );

        // Example Unique Arguments

        $data = '[{
            "email": "john.doe@sendgrid.com",
            "timestamp": 1337966815,
            "event": "click",
            "url": "http://sendgrid.com",
            "userid": "1123",
            "template": "welcome"
        }]';

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );


        // // Example Categories

        $data = '[{
            "email": "john.doe@sendgrid.com",
            "timestamp": 1337966815,
            "category": [
                "newuser",
                "transactional"
            ],
            "event": "open"
        },
        {
            "email": "jane.doe@sendgrid.com",
            "timestamp": 1337966815,
            "category": "olduser",
            "event": "open"
        }]';

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );

        // Example Marketing Email Unsubscribes

        $data = '[{
            "email": "nick@sendgrid.com",
            "timestamp": 1380822437,
            "newsletter": {
                "newsletter_user_list_id": "10557865",
                "newsletter_id": "1943530",
                "newsletter_send_id": "2308608"
            },
            "category": [
                "Tests",
                "Newsletter"
            ],
            "event": "unsubscribe"
        }]';

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );


        // Example Test Your Integration

        $data = '[{"email":"john.doe@sendgrid.com","timestamp":1337197600,"smtp-id":"<4FB4041F.6080505@sendgrid.com>","event":"processed"},{"email":"john.doe@sendgrid.com","timestamp":1337966815,"category":"newuser","event":"click","url":"http://sendgrid.com"},{"email":"john.doe@sendgrid.com","timestamp":1337969592,"smtp-id":"<20120525181309.C1A9B40405B3@Example-Mac.local>","event":"processed"}]';

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );

        // Example Test Your Integration from SendGrid Event Notification Settings

        $data = '[{
            "email": "john.doe@sendgrid.com",
            "sg_event_id": "VzcPxPv7SdWvUugt-xKymw",
            "sg_message_id": "142d9f3f351.7618.254f56.filter-147.22649.52A663508.0",
            "timestamp": 1386636112,
            "smtp-id": "<142d9f3f351.7618.254f56@sendgrid.com>",
            "event": "processed",
            "category": [
                "category1",
                "category2",
                "category3"
            ],
            "id": "001",
            "purchase": "PO1452297845",
            "uid": "123456"
        },{
            "email": "not an email address",
            "smtp-id": "<4FB29F5D.5080404@sendgrid.com>",
            "timestamp": 1386636115,
            "reason": "Invalid",
            "event": "dropped",
            "category": [
                "category1",
                "category2",
                "category3"
            ],
            "id": "001",
            "purchase": "PO1452297845",
            "uid": "123456"
        },{
            "email": "john.doe@sendgrid.com",
            "sg_event_id": "vZL1Dhx34srS-HkO-gTXBLg",
            "sg_message_id": "142d9f3f351.7618.254f56.filter-147.22649.52A663508.0",
            "timestamp": 1386636113,
            "smtp-id": "<142d9f3f351.7618.254f56@sendgrid.com>",
            "event": "delivered",
            "category":[
                "category1",
                "category2",
                "category3"
            ],
            "id": "001",
            "purchase": "PO1452297845",
            "uid": "123456"
        },{
            "email": "john.smith@sendgrid.com",
            "timestamp": 1386636127,
            "uid": "123456",
            "ip": "174.127.33.234",
            "purchase": "PO1452297845",
            "useragent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36",
            "id": "001",
            "category":[
                "category1",
                "category2",
                "category3"
            ],
            "event": "open"
        },{
            "uid": "123456",
            "ip": "174.56.33.234",
            "purchase": "PO1452297845",
            "useragent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36",
            "event": "click",
            "email": "john.doe@sendgrid.com",
            "timestamp": 1386637216,
            "url": "http://www.google.com/",
            "category":[
                "category1",
                "category2",
                "category3"
            ],
            "id": "001"
        },{
            "uid": "123456",
            "status": "5.1.1",
            "sg_event_id": "X_C_clhwSIi4EStEpol-SQ",
            "reason": "550 5.1.1 The email account that you tried to reach does not exist. Please try double-checking the recipient\'s email address for typos or unnecessary spaces. Learn more at http: //support.google.com/mail/bin/answer.py?answer=6596 do3si8775385pbc.262 - gsmtp ",
            "purchase": "PO1452297845",
            "event": "bounce",
            "email": "asdfasdflksjfe@sendgrid.com",
            "timestamp": 1386637483,
            "smtp-id": "<142da08cd6e.5e4a.310b89@localhost.localdomain>",
            "type": "bounce",
            "category":[
                "category1",
                "category2",
                "category3"
            ],
            "id": "001"
        },{
            "email": "john.doe@gmail.com",
            "timestamp": 1386638248,
            "uid": "123456",
            "purchase": "PO1452297845",
            "id": "001",
            "category":[
                "category1",
                "category2",
                "category3"
            ],
            "event": "unsubscribe"
        }]';
        //debug($result);

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );

    }

}
