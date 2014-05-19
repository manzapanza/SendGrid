<?php
    Router::connect('/sendgrid-inbound-parse-webhook/*', array('plugin' => 'SendGrid', 'controller' => 'send_grid', 'action' => 'inbound_parse_webhook'));
    Router::connect('/sendgrid-event-webhook/*', array('plugin' => 'SendGrid', 'controller' => 'send_grid', 'action' => 'event_webhook'));
    Router::mapResources('send_grid.send_grid');
    Router::parseExtensions('json');

    Router::resourceMap(array(
        array('action' => 'event_webhook', 'method' => 'POST', 'id' => false)
    ));