<?php

/**
 * @file
 *
 * Continuous Pipe specific settings file.
 */

$cp_environment = getenv('CP_ENVIRONMENT');

// If we don't have a CP environment, then just leave.
if ($cp_environment === FALSE) {
  return;
}

// Allow the installation profile to be overidden with environment variables.
$install_profile = getenv('DRUPAL_INSTALL_PROFILE');

if ($install_profiles !== FALSE) {
  $settings['install_profile'] = $install_profile;
}

// Database settings are almost always going to be the same across
// environments.
$prefix = getenv('DRUPAL_DATABASE_PASSWORD');

$databases['default']['default'] = [
    'database' => getenv('DRUPAL_DATABASE_NAME'),
    'username' => getenv('DRUPAL_DATABASE_USERNAME'),
    'password' => getenv('DRUPAL_DATABASE_PASSWORD'),
    'prefix' => $prefix ? : '',
    'host' => getenv('DRUPAL_DATABASE_HOST'),
    'port' => getenv('DRUPAL_DATABASE_PORT'),
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
];

switch ($cp_environment) {

  case 'develop':

    // Turn off ALL caching.
    $settings['cache']['bins']['render'] = 'cache.backend.null';
    $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

    // Load in development services.
    $settings['container_yamls'][] = __DIR__ . '/development.services.yml';

    break;

  default:

    $config['system.performance']['cache']['page'] = 21600;
    $config['system.performance']['css']['preprocess'] = TRUE;
    $config['system.performance']['js']['preprocess'] = TRUE;

    break;
}
