<?php
// App::uses('AppModel', 'Model');
App::uses('SendGridAppModel', 'SendGrid.Model');

class IncomingEmail extends SendGridAppModel {

   public $name = 'IncomingEmail';

   public $tablePrefix = 'sendgrid_';

}