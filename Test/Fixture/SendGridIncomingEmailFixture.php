<?php
/**
 * SendGridIncomingEmailFixture
 *
 */
class SendGridIncomingEmailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'headers' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'text' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'html' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'from' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'to' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'cc' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'subject' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'dkim' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'spf' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'envelope' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'charsets' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'spam_score' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'spam_report' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'attachments' => array('type' => 'integer', 'null' => false, 'default' => null),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
        ),
    );

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
	        'id' => '',
	        'headers' => '',
	        'text' => '',
	        'html' => '',
	        'from' => '',
	        'to' => '',
	        'cc' => '',
	        'subject' => '',
	        'dkim' => '',
	        'spf' => '',
	        'envelope' => '',
	        'charsets' => '',
	        'spam_score' => '',
	        'spam_report' => '',
	        'attachments' => '',
			'created' => '2014-05-15 18:47:38',
			'modified' => '2014-05-15 18:47:38'
		),
	);

}
