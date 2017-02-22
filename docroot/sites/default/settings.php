<?php

/**
 * @file
 * Drupal site-specific configuration file.
 *
 * Everything in this file is documented in default.settings.php.
 */

$databases = [];

$config_directories = [
  CONFIG_SYNC_DIRECTORY => '../core/sync'
];

$settings['install_profile'] = 'standard';

$settings['update_free_access'] = FALSE;

$settings['hash_salt'] = '';

$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

/**
 * Load Continuous Pipe settings if available.
 */
if (file_exists($app_root . '/' . $site_path . '/settings.continuouspipe.php')) {
  include $app_root . '/' . $site_path . '/settings.continuouspipe.php';
}

/**
 * Load local development override configuration, if available.
 */
if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
