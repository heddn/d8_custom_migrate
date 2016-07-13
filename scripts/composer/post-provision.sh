#!/usr/bin/env bash
set -ev

# Determine if we are running inside or outside of the vm.
if [ ! -d /var/www/drupalvm ]
then
  cd $(dirname "$0")/..
else
  cd /var/www/drupalvm
fi

# Run composer install.
composer install

# Provide default settings for running locally.
if [ ! -f ./web/sites/default/settings.local.php ]
then
  cp ./scripts/default.settings.local.php ./web/sites/default/settings.local.php
fi

# Install drupal.
chmod 644 ./web/sites/default/settings.php
