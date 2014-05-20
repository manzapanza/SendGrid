<?php
App::uses('SendGridAppModel', 'SendGrid.Model');

class SendGridEventUniqueArgument extends SendGridAppModel {

    public $name = 'SendGridEventUniqueArgument';

    /**
    * belongsTo associations
    *
    * @var array
    */
    public $belongsTo = array(
        'SendGridEvent' => array(
            'className' => 'SendGrid.SendGridEvent',
            'foreignKey' => 'send_grid_event_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
}