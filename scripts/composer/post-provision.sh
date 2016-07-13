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
mysql -u drupal --password=drupal drupal < ./libreD8.sql

# Create D6 db for migrations
zcat libreD6.sql.gz |mysql -u drupal6 --password=drupal6 drupal6

# Compile CSS
cd web/themes/custom/libre_custom_theme
npm install
node_modules/gulp-cli/bin/gulp.js less
