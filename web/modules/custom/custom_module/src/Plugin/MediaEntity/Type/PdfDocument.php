<?php

namespace Drupal\custom_module\Plugin\MediaEntity\Type;

use Drupal\media_entity\MediaInterface;
use Drupal\media_entity_document\Plugin\MediaEntity\Type\Document;

/**
 * Provides media type plugin for Document.
 *
 * @MediaType(
 *   id = "pdf_document",
 *   label = @Translation("PDF Document"),
 *   description = @Translation("Provides business logic and metadata for pdf documents.")
 * )
 */
class PdfDocument extends Document {

  /**
   * {@inheritdoc}
   */
  public function thumbnail(MediaInterface $media) {
    $source_field = $this->configuration['source_field'];
    /** @var \Drupal\file\FileInterface $file */
    $file = $media->{$source_field}->entity;

    if ($file) {
      $mimetype = $file->getMimeType();
      $mimetype = explode('/', $mimetype);
      $thumbnail = $this->config->get('icon_base') . "/{$mimetype[0]}-{$mimetype[1]}.png";

      if (!is_file($thumbnail)) {
        $thumbnail = $this->config->get('icon_base') . "/{$mimetype[1]}.png";

        if (!is_file($thumbnail)) {
          $thumbnail = $this->config->get('icon_base') . '/document.png';
        }
      }
    }
    else {
      $thumbnail = $this->config->get('icon_base') . '/document.png';
    }

    return $thumbnail;
  }

}
