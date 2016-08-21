<?php

use Rocketeer\Services\Connections\ConnectionsHandler;

return [

    // The name of the application to deploy
    // This will create a folder of the same name in the root directory
    // configured above, so be careful about the characters used
    'application_name' => 'drone-rocketeer-deploy-demo',

    // Plugins
    ////////////////////////////////////////////////////////////////////

    // The plugins to load
    'plugins'          => [// 'Rocketeer\Plugins\Slack\RocketeerSlack',
    ],

    // Logging
    ////////////////////////////////////////////////////////////////////

    // The schema to use to name log files
    'logs'             => function (ConnectionsHandler $connections) {
        return sprintf('%s-%s-%s.log', $connections->getConnection(), $connections->getStage(), date('Ymd'));
    },

    // Remote access
    //
    // You can either use a single connection or an array of connections
    ////////////////////////////////////////////////////////////////////

    // The default remote connection(s) to execute tasks on
    'default'          => ['staging'],

    // The various connections you defined
    // You can leave all of this empty or remove it entirely if you don't want
    // to track files with credentials : Rocketeer will prompt you for your credentials
    // and store them locally
    'connections'      => [
        'staging' => [
            'host'      => '10.0.1.127',
            'username'  => 'deploy',
            'password'  => '',
            'key'       => '',
            'keyphrase' => '',
            'agent'     => '',
            'db_role'   => true,
        ],
    ],

    /*
     * In most multiserver scenarios, migrations must be run in an exclusive server.
     * In the event of not having a separate database server (in which case it can
     * be handled through connections), you can assign a 'db_role' => true to the
     * server's configuration and it will only run the migrations in that specific
     * server at the time of deployment.
     */
    'use_roles'        => false,

    // Contextual options
    //
    // In this section you can fine-tune the above configuration according
    // to the stage or connection currently in use.
    // Per example :
    'stages' => [
     	'staging' => [
     		'scm' => ['branch' => 'staging'],
     	],
        'production' => [
            'scm' => ['branch' => 'master'],
        ],
    ],
    ////////////////////////////////////////////////////////////////////

    'on'               => [

        // Stages configurations
        'stages'      => [],
        // Connections configuration
        'connections' => [],

    ],

];
