#!/bin/bash

# Create folder _patterns 
echo "PatternLab Configuration"
cd ../../../../bower_components/edition-php-drupal-standard/
composer install
cd source/
mkdir _patterns
cd ..
php core/console --starterkit --init
php core/console --starterkit --install aleksip/starterkit-shila-drupal-theme
php core/console --generate
