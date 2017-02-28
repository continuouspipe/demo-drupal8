<?php

/**
 * @file
 *
 * An example settings file for when hosting a site on Continuous Pipe.
 */

 $databases['default']['default'] = [
    'database' => getenv('DRUPAL_DATABASE_NAME'),
    'username' => getenv('DRUPAL_DATABASE_USERNAME'),
    'password' => getenv('DRUPAL_DATABASE_PASSWORD'),
    'prefix' => '',
    'host' => getenv('DRUPAL_DATABASE_HOST'),
    'port' => getenv('DRUPAL_DATABASE_PORT'),
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
];