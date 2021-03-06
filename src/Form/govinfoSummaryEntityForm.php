<?php

namespace Drupal\govinfo\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger;

/**
 * Form controller for Summary entity edit forms.
 *
 * @ingroup govinfo
 */
class govinfoSummaryEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\govinfo\Entity\SummaryEntity */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = &$this->entity;
    $status = parent::save($form, $form_state);
    $this->message = \Drupal::messenger();

    switch ($status) {
      case SAVED_NEW:
        $this->message->addMessage(
          t('Created the %label govinfo summary entity.', [
            '%label' => $entity->label(),
            ]
          )
        );
        break;

      default:
        $this->message->addMessage(
          t('Saved the %label govinfo summary entity.', [
            '%label' => $entity->label(),
            ]
          )
        );
        break;
    }
    //$form_state->setRedirect('entity.tweet_entity.canonical', ['tweet_entity' => $entity->id()]);
  }

}
