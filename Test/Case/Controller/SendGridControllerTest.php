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
        Configure::write('SendGrid.findUniqueArguments', array('userid', 'template'));

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

        // // Example Marketing Email Unsubscribes

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


        // // Example Test Your Integration

        $data = '[{"email":"john.doe@sendgrid.com","timestamp":1337197600,"smtp-id":"<4FB4041F.6080505@sendgrid.com>","event":"processed"},{"email":"john.doe@sendgrid.com","timestamp":1337966815,"category":"newuser","event":"click","url":"http://sendgrid.com"},{"email":"john.doe@sendgrid.com","timestamp":1337969592,"smtp-id":"<20120525181309.C1A9B40405B3@Example-Mac.local>","event":"processed"}]';

        $result = $this->testAction(
            '/sendgrid-event-webhook/-test-secret-key-',
            array(
                'data' => $data,
                'method' => 'post'
            )
        );

        //debug($result);

    }

}
