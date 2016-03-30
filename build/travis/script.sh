#!/usr/bin/env bash
set -ev
# Run core's PHPUnit tests cause they are fast.
export SIMPLETEST_DB="sqlite://tmp/site.sqlite"
export SIMPLETEST_BASE_URL="http://localhost:8080"
# PHP Unit takes too long
#cd ${TRAVIS_BUILD_DIR}/web
#${TRAVIS_BUILD_DIR}/vendor/bin/phpunit -c core --exclude-group Composer
# Run PhantomJS.
mkdir -p /tmp/pjsdrivercache/phantomjs
phantomjs --ssl-protocol=any --ignore-ssl-errors=true ${TRAVIS_BUILD_DIR}/vendor/jcalderonzumba/gastonjs/src/Client/main.js 8510 1024 768 2>&1 > /tmp/gastonjs.log &
# Install & run Behat tests.
cd ${TRAVIS_BUILD_DIR}/test
${TRAVIS_BUILD_DIR}/vendor/bin/behat --version
${TRAVIS_BUILD_DIR}/vendor/bin/behat
