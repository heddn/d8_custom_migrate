#!/usr/bin/env bash
set -ev
phpenv config-rm xdebug.ini
# Disable sendmail for local PHP for install.
echo sendmail_path=`which true` >> ~/.phpenv/versions/$(phpenv version-name)/etc/conf.d/sendmail_disable.ini
composer --verbose self-update
composer --version
# Provide db connection string for installation.
printf "<?php\n\$databases['default']['default'] = ['database' => 'travis', 'username' => 'root', 'password' => '', 'prefix' => '', 'host' => 'localhost', 'port' => '3306', 'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql', 'driver' => 'mysql'];" > $DOCROOT/sites/default/settings.local.php
