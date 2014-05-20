<?php
App::uses('SendGridAppModel', 'SendGrid.Model');

class SendGridEventCategory extends SendGridAppModel {

    public $name = 'SendGridEventCategory';

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