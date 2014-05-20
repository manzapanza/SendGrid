<?php
class InitMigrations extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
    public $description = 'Init SendGrid tables';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'send_grid_incoming_emails' => array(
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
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
                ),
                'send_grid_events' => array(
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
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
                ),
                'send_grid_event_categories' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
                    'send_grid_event_id' => array('type' => 'integer', 'null' => false, 'default' => null),
                    'category' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
                ),
                'send_grid_event_unique_arguments' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
                    'send_grid_event_id' => array('type' => 'integer', 'null' => false, 'default' => null),
                    'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                    'value' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                    'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
                ),
            )
        ),
        'down' => array(
            'drop_table' => array(
                'send_grid_incoming_emails',
                'send_grid_events',
                'send_grid_event_categories',
                'send_grid_event_unique_arguments'
            )
        )
    );

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 */
    public function before($direction) {
        return true;
    }

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 */
    public function after($direction) {
        return true;
    }

}