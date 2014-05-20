<?php
App::uses('SendGridAppModel', 'SendGrid.Model');

class SendGridEvent extends SendGridAppModel {

    public $name = 'SendGridEvent';

    /**
    * hasMany associations
    *
    * @var array
    */
    public $hasMany = array(
        'SendGridEventCategory' => array(
            'className' => 'SendGrid.SendGridEventCategory',
            'foreignKey' => 'send_grid_event_id',
            'dependent' => true,
        ),
        'SendGridEventUniqueArgument' => array(
            'className' => 'SendGrid.SendGridEventUniqueArgument',
            'foreignKey' => 'send_grid_event_id',
            'dependent' => true,
        ),
    );

}