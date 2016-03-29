#!/usr/bin/env bash
sudo cat /var/log/apache2/error.log
sudo cat /var/log/apache2/travis_error.log
sudo cat /var/log/apache2/access.log
sudo cat /var/log/apache2/travis_access.log
sudo cat /var/log/apache2/php_error.log
sudo cat /var/log/apache2/travis_php_error.log
sudo cat /var/log/apache2/other_vhosts_access.log
