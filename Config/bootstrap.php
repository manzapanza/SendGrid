<?php
/**
 * Secret Key String as authentication for the SendGrid Parse Incoming Webhooks
 *
 * Uncomment the line below and copy and paste on your app/Config/core.php file and change the key with another string
 *
 * This key is used to authenticate the webhooks and you must to set from the sendrid setting panel:
 * https://sendgrid.com/developer/reply
 *
 * Url:
 * http://www.example.com/sendgrid-inbound-parse-webhook/cT4pqgfAiWMJH6JPTUv9
 */

    // Configure::write('SendGrid.secretKeyStr', 'cT4pqgfAiWMJH6JPTUv9');

/**
 * Find Unique Argument fields in POST event webhook
 * https://sendgrid.com/docs/API_Reference/SMTP_API/unique_arguments.html
 * When you send email with
 *
 */

    // Configure::write('SendGrid.findUniqueArguments', array('field1', 'field2'));