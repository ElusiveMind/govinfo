<?php

namespace Drupal\govinfo\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'downloads_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "downloads_formatter",
 *   label = @Translation("Downloads"),
 *   field_types = {
 *     "downloads"
 *   }
 * )
 */
class DownloadsFormatterType extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      // Implement default settings.
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
      // Implement settings form.
    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    $values = $item->toArray();
    $labels = [
      'pdf_link' => 'PDF Summary Document',
      'xml_link' => 'XML Summary Document',
      'htm_link' => 'HTML Summary Document',
      'xls_link' => 'XLS Summary Document',
      'mods_link' => 'MODS Summary Document',
      'premis_link' => 'Premis Summary Document',
      'uslm_link' => 'USLM Summary Document',
      'zip_link' => 'Zip Archive Summary',
    ];

    $display = NULL;
    foreach ($values as $key => $value) {
      if (!empty($value)) {
        $display .= '<div class="document-link"><a class="document-anchor" href="/govinfo-download/' . base64_encode($value) . '">' . $labels[$key] . '</a></div>';
      }
    }
    return $display;
  }

}
