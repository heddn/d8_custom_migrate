<?php

namespace Drupal\custom_theme\Plugin\Alter;

use Drupal\bootstrap\Plugin\Alter\ThemeSuggestions as BootstrapThemeSuggestions;
use Drupal\bootstrap\Utility\Element;
use Drupal\Component\Transliteration\TransliterationInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Implements hook_theme_suggestions_alter().
 *
 * @ingroup plugins_alter
 *
 * @BootstrapAlter("theme_suggestions")
 */
class ThemeSuggestions extends BootstrapThemeSuggestions implements ContainerFactoryPluginInterface {

  /**
   * Transliteration service.
   *
   * @var \Drupal\Component\Transliteration\TransliterationInterface
   */
  protected $transliteration;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, TransliterationInterface $transliteration) {
    $this->transliteration = $transliteration;
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('transliteration')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function alter(&$suggestions, &$variables = NULL, &$hook = NULL) {
    parent::alter($suggestions, $variables, $hook);

    switch ($hook) {
      case 'field':
        /** @var  \Drupal\bootstrap\Utility\Element $element */
        $element = Element::create($variables['element']);
        $sanitizedViewMode = strtr($element->getProperty('view_mode'), '.', '_');
        $entityType = $element->getProperty('entity_type');
        $fieldName = $element->getProperty('field_name');
        $bundle = $element->getProperty('bundle');
        $suggestions[] = 'field__' . $entityType . '__' . $fieldName . '__' . $bundle . '__' . $sanitizedViewMode;
        break;

      case 'block':
        /** @var  \Drupal\bootstrap\Utility\Element $elements */
        $elements = Element::create($variables['elements']);
        if ($elements->getProperty('base_plugin_id') == 'block_content') {
          $bundle = $elements->content['#block_content']->bundle();
          $suggestions[] = $variables['theme_hook_original'] . '__' . $bundle;
        }
        break;

      case 'user':
        /** @var  \Drupal\bootstrap\Utility\Element $elements */
        $elements = Element::create($variables['elements']);
        $sanitizedViewMode = strtr($elements->getProperty('view_mode'), '.', '_');
        $suggestions[] = $variables['theme_hook_original'] . '__' . $sanitizedViewMode;
    }
  }

}
