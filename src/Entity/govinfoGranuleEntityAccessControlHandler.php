<?php

namespace Drupal\govinfo\Entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the govinfo granule entity.
 *
 * @see \Drupal\govinfo\Entity\GranuleEntity.
 */
class govinfoGranuleEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\govinfo\Entity\SummaryEntityInterface $entity */
    switch ($operation) {
      case 'view':

      // if (!$entity->isQuotedOrRepliedTweet()) {
      //   return AccessResult::allowedIfHasPermission($account, 'access content');
      // }
      return AccessResult::allowedIfHasPermission($account, 'access content');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'access content');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'access content');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

}
