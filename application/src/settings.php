<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/app/views/',
        ],

		'jsonPath' => __DIR__ . '/../data/',

         // Database connection settings
         "db_trab_vagrant_eloquent" => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'questiondb_elq',
            'username' => 'homestead',
            'password' => 'secret',
            'collation' => 'utf8_general_ci',
            'charset' => 'utf8',
            'prefix' => ''
        ],

         // Database connection settings
         "db_casa_local_eloquent" => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'questiondb_elq',
            'username' => 'root',
            'password' => '123456',
            'collation' => 'utf8_general_ci',
            'charset' => 'utf8',
            'prefix' => ''
        ],

        // Other config
        "db_casa_local_oniees" => [
           'driver' => 'mysql',
           'host' => '127.0.0.1',
           'database' => 'onieesdb2',
           'username' => 'root',
           'password' => 'admin812',
           'collation' => 'utf8_general_ci',
           'charset' => 'utf8',
           'prefix' => ''
        ],

        // Database connection settings
        "db_trab_vagrant_oniees" => [
          'driver' => 'mysql',
          'host' => '127.0.0.1',
          'database' => 'onieesdb2',
          'username' => 'homestead',
          'password' => 'secret',
          'collation' => 'utf8_general_ci',
          'charset' => 'utf8',
          'strict' => false, // Para Mysql 5.7 esta en modo estricto sql_mode error group by
          'prefix' => ''
        ],

        // Database connection settings
        "db_host_jrodevworks_oniees" => [
          'driver' => 'mysql',
          'host' => 'localhost',
          'database' => 'id8438067_jrodevworks',
          'username' => 'id8438067_jrodevworks	',
          'password' => 'jrodevworks',
          'collation' => 'utf8_general_ci',
          'charset' => 'utf8',
          'prefix' => ''
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'env' => getenv('APP_ENV'),
        'socket-url' => (getenv('APP_ENV')=='production') ? 'https://socket-menu.herokuapp.com' : 'http://192.168.10.17:8686'
    ],
];
