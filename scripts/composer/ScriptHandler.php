<?php

/**
 * @file
 * Contains \DrupalProject\composer\ScriptHandler.
 */

namespace DrupalProject\composer;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

class ScriptHandler {

  protected static function getDrupalRoot($project_root) {
    return $project_root .  '/web';
  }

  protected static function getSeedRoot($project_root) {
    return $project_root .  '/scripts/seed';
  }

  public static function buildScaffold(Event $event) {
    $fs = new Filesystem();
    if (!$fs->exists(static::getDrupalRoot(getcwd()) . '/autoload.php')) {
      \DrupalComposer\DrupalScaffold\Plugin::scaffold($event);
    }
  }

  public static function createRequiredFiles(Event $event) {
    $fs = new Filesystem();
    $root = static::getDrupalRoot(getcwd());
    $seedRoot = static::getSeedRoot(getcwd());

    $dirs = [
      'modules',
      'profiles',
      'themes',
    ];

    // Required for unit testing
    foreach ($dirs as $dir) {
      if (!$fs->exists($root . '/'. $dir)) {
        $fs->mkdir($root . '/'. $dir);
        $fs->touch($root . '/'. $dir . '/.gitkeep');
      }
    }

    // Prepare the settings file for installation
    if (!$fs->exists($root . '/sites/default/settings.php')) {
      $fs->copy($root . '/sites/default/default.settings.php', $root . '/sites/default/settings.php');
      $fs->chmod($root . '/sites/default/settings.php', 0666);
      $event->getIO()->write("Create a sites/default/settings.php file with chmod 0666");
    }

    // Prepare the settings local file for installation
    if (!$fs->exists($root . '/sites/default/settings.local.php')) {
      $fs->copy($seedRoot . '/settings.local.php', $root . '/sites/default/settings.local.php');
      $fs->chmod($root . '/sites/default/settings.local.php', 0644);
      $event->getIO()->write("Create a sites/default/settings.local.php file with chmod 0644");
    }

    // Prepare the services file for installation
    if (!$fs->exists($root . '/sites/default/services.yml')) {
      $fs->copy($root . '/sites/default/default.services.yml', $root . '/sites/default/services.yml');
      $fs->chmod($root . '/sites/default/services.yml', 0666);
      $event->getIO()->write("Create a sites/default/services.yml file with chmod 0666");
    }

    // Prepare the services local file for installation
    if (!$fs->exists($root . '/sites/default/services.local.yml')) {
      $fs->copy($seedRoot . '/services.local.yml', $root . '/sites/default/services.local.yml');
      $fs->chmod($root . '/sites/default/services.local.yml', 0644);
      $event->getIO()->write("Create a sites/default/services.local.yml file with chmod 0644");
    }

    // Create the files directory with chmod 0777
    if (!$fs->exists($root . '/sites/default/files')) {
      $oldmask = umask(0);
      $fs->mkdir($root . '/sites/default/files', 0777);
      umask($oldmask);
      $event->getIO()->write("Create a sites/default/files directory with chmod 0777");
    }
  }

}
