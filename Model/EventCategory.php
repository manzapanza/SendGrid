<?php
App::uses('SendGridAppModel', 'SendGrid.Model');

class EventCategory extends SendGridAppModel {

    public $name = 'EventCategory';

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