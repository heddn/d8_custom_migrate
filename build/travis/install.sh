#!/usr/bin/env bash
set -ev
composer --verbose --prefer-dist install
cd ${TRAVIS_BUILD_DIR}/web
printf "<?php\n\$databases['default']['default'] = ['database' => 'tmp/site.sqlite', 'prefix' => '', 'namespace' => 'Drupal\\Core\\Database\\Driver\\sqlite', 'driver' => 'sqlite'];" > ${TRAVIS_BUILD_DIR}/web/sites/default/settings.local.php
${TRAVIS_BUILD_DIR}/vendor/bin/drush site-install --verbose --yes config_installer --db-url=sqlite://tmp/site.sqlite
${TRAVIS_BUILD_DIR}/vendor/bin/drush runserver --dns localhost:8080 - &
nvm install 4
npm install -g yarn
cd ${TRAVIS_BUILD_DIR}/web/themes/custom/custom_theme
yarn install
yarn run gulp
sleep 3
