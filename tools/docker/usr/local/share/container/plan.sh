#! /usr/bin/env bash

#####
# Override the default do_drupal_start to remove the installation so we can
# move it to a task.
#####
do_drupal_start() {
  # If you've got a mounted volume, sometimes the permissions won't have been
  # reset, so we should try again now.
  do_drupal_permissions
}