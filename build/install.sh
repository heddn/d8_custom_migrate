#!/usr/bin/env bash
set -ev
mysql -e 'create database IF NOT EXISTS travis;' -uroot
composer --verbose install
phpenv rehash
cd $DOCROOT
$TRAVIS_BUILD_DIR/vendor/bin/drush site-install config_installer -y --verbose --db-url=mysql://root:@127.0.0.1/travis --db-su='root' --db-su-pw=''
