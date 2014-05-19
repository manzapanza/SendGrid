SendGrid Plugin
===============

SendGrid Plugin for CakePHP

## Installation ##

To install the plugin, place the files in a directory labelled "SendGrid" in your "app/Plugin/" directory.

Git Submodule
-------------

If you're using git for version control, you may want to add the **SendGrid** plugin as a submodule on your repository. To do so, run the following command from the base of your repository:


    git submodule add git@github.com:manzapanza/SendGrid.git app/Plugin/SendGrid


After doing so, you will see the submodule in your changes pending, plus the file ".gitmodules". Simply commit and push to your repository.

To initialize the submodule(s) run the following command:

    git submodule update --init --recursive

To retreive the latest updates to the plugin, assuming you're using the "master" branch, go to "app/Plugin/SendGrid" and run the following command:

    git pull origin master


## Schema & Migrations ##

The plugin is pretty easy to set up, all you need to do is to copy it to you application plugins folder and load the needed tables. You can create database tables using either the schema shell or the [CakeDC Migrations plugin](http://github.com/CakeDC/migrations):

    ./Console/cake schema create --plugin SendGrid

or

    ./Console/cake Migrations.migration run all --plugin SendGrid

## How to Use it ##

### AppController Config ###

In your AppController put the plugin's actions in Auth allowed actions:

    $this->Auth->allowedActions = array(
        ...
        ...
        //Plugin SendGrid
        'inbound_parse_webhook',
        'event_webhook'
    );

### Core Config ###

Copy from /app/Plugin/SendGrid/Config/bootstrap.php and add to your /app/Config/core.php file the SendGrid Configuration variables:

    /**
     * SendGrid Plugin - Secret Key String as authentication for the SendGrid Parse Incoming Webhooks
     */

        Configure::write('SendGrid.secretKeyStr', '--putYourSecretKeyString--');

    /**
     * SendGrid Plugin - Find Unique Argument fields
     */

        Configure::write('SendGrid.findUniqueArguments', array(
            'field1',
            'field2',
            'field3',
            'field4',
        ));

### Enable Log Event Input Json Data ###

Add Config var to enable the logging of all json data posted by sendgrid

    CakeLog::config('sendgrid_event_webhook', array(
        'engine' => 'FileLog',
        'types' => array('info'),
        'scopes' => array('sendgrid_event_webhook'),
        'file' => 'sendgrid_event_webhook'
    ));

    Configure::write('SendGrid.logInputData', true);

### SendGrid configuration ###

Login in SendGrid and activate the app called *Event Notification* from the page https://sendgrid.com/app
and click on *Settings*:

Put the url in the **HTTP Post Url** field:

    http://www.example.com/sendgrid-event-webhook/--putYourSecretKeyString--

And select the Actions that you want to be notified:

    x All
    x Processed
    x Dropped
    x Deferred
    x Delivered
    x Bounced
    x Opened
    x Clicked
    x Unsubscribed From
    x Marked as Spam

Click on **Test Your Integration** button to test the configuration

Save the settings clicking on **Save** button

## Requirements ##

- CakePHP 2.4+
- PHP 5.2.8+
- [CakeDC Migrations plugin](http://github.com/CakeDC/migrations)
