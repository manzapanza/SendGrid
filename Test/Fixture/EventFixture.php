<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'event' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'smtp-id' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'useragent' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ip' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'response' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'attempt' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'url' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'status' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'reason' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'newsletter_user_list_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'newsletter_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'newsletter_send_id' => array('type' => 'integer', 'null' => false, 'default' => null),
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
	        'id' => 1,
	        'event' => 'open',
	        'email' => 'maxappbr@gmail.com',
	        'smtp-id' => '123456789qwertyuiop',
	        'useragent' => 'user agent',
	        'ip' => '8.8.8.8',
	        'response' => 'response',
	        'attempt' => 'attempt',
	        'url' => 'url',
	        'status' => 'status',
	        'reason' => 'reason',
	        'type' => 'type',
	        'newsletter_user_list_id' => 1,
	        'newsletter_id' => 2,
	        'newsletter_send_id' => 3,
			'created' => '2014-05-15 18:47:38',
			'modified' => '2014-05-15 18:47:38'
		),
		array(
	        'id' => 2,
	        'event' => 'click',
	        'email' => 'maxappbr@gmail.com',
	        'smtp-id' => '123456789qwertyuiop',
	        'useragent' => 'user agent',
	        'ip' => '8.8.8.8',
	        'response' => 'response',
	        'attempt' => 'attempt',
	        'url' => 'url',
	        'status' => 'status',
	        'reason' => 'reason',
	        'type' => 'type',
	        'newsletter_user_list_id' => 2,
	        'newsletter_id' => 3,
	        'newsletter_send_id' => 4,
			'created' => '2014-05-16 18:47:38',
			'modified' => '2014-05-16 18:47:38'
		),
	);

}
