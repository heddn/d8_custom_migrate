#!/usr/bin/env bash
set -ev
# Run core's PHPUnit tests cause they are fast.
$(phpenv which php) $DOCROOT/core/scripts/run-tests.sh --php $(phpenv which php) --sqlite $TRAVIS_BUILD_DIR/travis.sqlite PHPUnit
# Set up selenium.
sh -e /etc/init.d/xvfb start
export DISPLAY=:99.0
export SELENIUM_MAJ_VERSION=2.53
export SELENIUM_MIN_VERSION=0
wget http://selenium-release.storage.googleapis.com/${SELENIUM_MAJ_VERSION}/selenium-server-standalone-${SELENIUM_MAJ_VERSION}.${SELENIUM_MIN_VERSION}.jar
java -jar selenium-server-standalone-${SELENIUM_MAJ_VERSION}.${SELENIUM_MIN_VERSION}.jar > /dev/null &
sleep 5
# Install & run Behat tests.
cd $TRAVIS_BUILD_DIR/test && behat
