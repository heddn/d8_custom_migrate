<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Testwork\Tester\Result\TestResult;
use Drupal\DrupalExtension\Context\DrupalContext;
use PHPUnit_Framework_Assert as Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends DrupalContext implements SnippetAcceptingContext {

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct() {}

  /**
   * @AfterStep
   */
  public function dumpInfoAfterFailedStep(AfterStepScope $scope) {
    if ($scope->getTestResult()->getResultCode() === TestResult::FAILED) {

      $driver = $this->getSession()->getDriver();
      if (!$driver instanceof Selenium2Driver) {
        return;
      }
      $baseUrl = $this->getMinkParameter('base_url');
      $fileName = date('d-m-y') . '-' . uniqid() . '.png';
      $filePath = $this->getContainer()->get('kernel')->getRootdir() . '/../web/tmp/';

      $this->saveScreenshot($fileName, $filePath);
      print 'Screenshot at: ' . $baseUrl . 'tmp/' . $fileName;

      $this->iPutABreakpoint();
    }
  }

}
