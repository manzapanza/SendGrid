<?php
/**
 * EventCategoryFixture
 *
 */
class EventCategoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'sendgrid_event_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'category' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
	        'sendgrid_event_id' => 1,
	        'category' => 'Category A',
			'created' => '2014-05-15 18:47:38',
			'modified' => '2014-05-15 18:47:38'
		),
		array(
	        'id' => 2,
	        'sendgrid_event_id' => 1,
	        'category' => 'Category B',
			'created' => '2014-05-15 18:47:38',
			'modified' => '2014-05-15 18:47:38'
		),
		array(
	        'id' => 3,
	        'sendgrid_event_id' => 2,
	        'category' => 'Category C',
			'created' => '2014-05-15 18:47:38',
			'modified' => '2014-05-15 18:47:38'
		),
		array(
	        'id' => 4,
	        'sendgrid_event_id' => 2,
	        'category' => 'Category D',
			'created' => '2014-05-15 18:47:38',
			'modified' => '2014-05-15 18:47:38'
		),
	);

}
