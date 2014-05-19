<?php
App::uses('SendGridAppModel', 'SendGrid.Model');

class EventUniqueArgument extends SendGridAppModel {

    public $name = 'EventUniqueArgument';

    public $tablePrefix = 'sendgrid_';

    /**
    * belongsTo associations
    *
    * @var array
    */
    public $belongsTo = array(
        'Event' => array(
            'className' => 'SendGrid.Event',
            'foreignKey' => 'sendgrid_event_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
}