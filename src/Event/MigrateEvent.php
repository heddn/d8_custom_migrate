<?php
/**
 * @file
 * Contains \Drupal\migrate\Event\MigrateMapDeleteEvent.
 */


namespace Drupal\custom_migrate\Event;

use Drupal\migrate_plus\Event\MigratePlusEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\migrate_plus\Event\MigratePrepareRowEvent;

class MigrateEvent implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[MigratePlusEvents::PREPARE_ROW][] = array('onPrepareRow', 0);
    return $events;
  }

  /**
   * React to a new row.
   *
   * @param \Drupal\migrate_plus\Event\MigratePrepareRowEvent $event
   *   The prepare-row event.
   */
  public function onPrepareRow(MigratePrepareRowEvent $event) {
    $row = $event->getRow();

    $row->setDestinationProperty('first_last', $row->getSourceProperty('first_name') . ' ' . $row->getSourceProperty('last_name'));
  }
}
