<?php
App::uses('SendGridAppModel', 'SendGrid.Model');

class Event extends SendGridAppModel {

    public $name = 'Event';

    public $tablePrefix = 'sendgrid_';

    public $events = array(
        'Processed' => 'Message has been received and is ready to be delivered.',
        'Dropped' => 'You may see the following drop reasons:',
        'Invalid' => 'SMTPAPI header',
        'Spam' => 'Content (if spam checker app enabled)',
        'Unsubscribed' => 'Address',
        'Bounced' => 'Address',
        'Spam' => 'Reporting Address',
        'Invalid' =>'' ,
        'Delivered' => 'Message has been successfully delivered to the receiving server.',
        'Deferred' => 'Recipient’s email server temporarily rejected message.',
        'Bounce' => 'Receiving server could not or would not accept message.',
        'Open' => 'Recipient has opened the HTML message.',
        'Click' => 'Recipient clicked on a link within the message.',
        'Spam' => 'Report Recipient marked message as spam.',
        'Unsubscribe' => 'Recipient clicked on message’s subscription management link.',
    );

    /**
    * hasMany associations
    *
    * @var array
    */
    public $hasMany = array(
        'EventCategory' => array(
            'className' => 'SendGrid.EventCategory',
            'foreignKey' => 'sendgrid_event_id',
            'dependent' => true,
        ),
        'EventUniqueArgument' => array(
            'className' => 'SendGrid.EventUniqueArgument',
            'foreignKey' => 'sendgrid_event_id',
            'dependent' => true,
        ),
    );

}