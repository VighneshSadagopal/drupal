<?php

namespace Drupal\flag;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Session\SessionManagerInterface;
use Drupal\user\Entity\User;
use Drupal\user\UserInterface;

/**
 * Flag service.
 *  - Handles search requests for flags and flaggings.
 *  - Performs flagging and unflaging operations.
 */
class FlagService implements FlagServiceInterface {

  /**
   * The current user injected into the service.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /*
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /*
   * The session manager.
   *
   * @var \Drupal\Core\Session\SessionManagerInterface
   */
  protected $sessionManager;

  /**
   * Constructor.
   *
   * @param QueryFactory $entity_query
   *   The entity query factory.
   * @param AccountInterface $current_user
   *   The current user.
   * @param EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param Drupal\Core\Session\SessionManagerInterface $session_manager
   *   The session manager.
   */
  public function __construct(AccountInterface $current_user,
                              EntityTypeManagerInterface $entity_type_manager,
                              SessionManagerInterface $session_manager) {
    $this->currentUser = $current_user;
    $this->entityTypeManager = $entity_type_manager;
    $this->sessionManager = $session_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function getAllFlags($entity_type = NULL, $bundle = NULL) {
    $query = $this->entityTypeManager->getStorage('flag')->getQuery();

    if ($entity_type != NULL) {
      $query->condition('entity_type', $entity_type);
    }

    $ids = $query->execute();
    $flags = $this->getFlagsByIds($ids);

    if (isset($bundle)) {
      $flags = array_filter($flags, function (FlagInterface $flag) use ($bundle) {
        $bundles = $flag->getApplicableBundles();
        return in_array($bundle, $bundles);
      });
    }

    return $flags;
  }

  /**
   * {@inheritdoc}
   */
  public function getFlagging(FlagInterface $flag, EntityInterface $entity, AccountInterface $account = NULL, $session_id = NULL) {
    $this->populateFlaggerDefaults($account, $session_id);

    $flaggings = $this->getEntityFlaggings($flag, $entity, $account, $session_id);

    return !empty($flaggings) ? reset($flaggings) : NULL;
  }

  /**
   * Makes sure session is started.
   */
  protected function ensureSession() {
    if ($this->currentUser->isAnonymous() && !$this->sessionManager->isStarted()) {
      // Add something to $_SESSION so the session ID will persist.
      // TODO: Replace this with something cleaner once core provides it.
      // See https://www.drupal.org/node/2865991.
      $_SESSION['flag'] = TRUE;
      $this->sessionManager->start();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function populateFlaggerDefaults(AccountInterface &$account = NULL, &$session_id = NULL) {
    // Note that the $account parameter must be explicitly set to be passed by
    // reference for the case when the variable is NULL rather than an object;
    // also, it must be optional to allow a variable that is NULL to pass the
    // type-hint check.

    if (!isset($account)) {
      // If there isn't an account, set it to the current user.
      $account = $this->currentUser;
      // If the user is anonymous, get the session ID. Note that this does not
      // always mean that the session is started. Session is started explicitly
      // from FlagService->ensureSession() method.
      if (!isset($session_id) && $account->isAnonymous()) {
        $session_id = $this->sessionManager->getId();
      }
    }
    elseif ($account->isAnonymous() && $session_id === NULL) {
  /**    throw new \LogicException('Anonymous users must be identified by session_id');*/
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityFlaggings(FlagInterface $flag, EntityInterface $entity, AccountInterface $account = NULL, $session_id = NULL) {
    $query = $this->entityTypeManager->getStorage('flagging')->getQuery();

    $query->condition('flag_id', $flag->id());

    if (!is_null($account)) {
      if (!$flag->isGlobal()) {
        $query->condition('uid', $account->id());

        // Add the session ID to the query if $account is the anonymous user
        // (and require the $session_id parameter in this case).
        if ($account->isAnonymous()) {
          if (empty($session_id)) {
            throw new \LogicException('An anonymous user must be identified by session ID.');
          }

          $query->condition('session_id', $session_id);
        }
      }
    }

    $query->condition('entity_type', $entity->getEntityTypeId())
      ->condition('entity_id', $entity->id());

    $ids = $query->execute();

    return $this->getFlaggingsByIds($ids);
  }

  /**
   * {@inheritdoc}
   */
  public function getAllEntityFlaggings(EntityInterface $entity, AccountInterface $account = NULL, $session_id = NULL) {
    $query = $this->entityTypeManager->getStorage('flagging')->getQuery();

    if (!empty($account)) {
      // Use an OR condition group to check that either the account flagged
      // the entity, or the flag itself is a global flag.
      $global_or_user = $query->orConditionGroup()
        ->condition('global', 1)
        ->condition('uid', $account->id());
      $query->condition($global_or_user);
      if ($account->isAnonymous()) {
       /*
        if (empty($session_id)) {
          throw new \LogicException('An anonymous user must be identified by session ID.');
        }
        */

        $query->condition('session_id', $session_id);
      }
    }

    $query->condition('entity_type', $entity->getEntityTypeId())
      ->condition('entity_id', $entity->id());

    $ids = $query->execute();

    return $this->getFlaggingsByIds($ids);
  }

  /**
   * {@inheritdoc}
   */
  public function getFlagById($flag_id) {
    return $this->entityTypeManager->getStorage('flag')->load($flag_id);
  }

  /**
   * {@inheritdoc}
   */
  public function getFlaggableById(FlagInterface $flag, $entity_id) {
    return $this->entityTypeManager->getStorage($flag->getFlaggableEntityTypeId())
      ->load($entity_id);
  }

  /**
   * {@inheritdoc}
   */
  public function getFlaggingUsers(EntityInterface $entity, FlagInterface $flag = NULL) {
    $query = $this->entityTypeManager->getStorage('flagging')->getQuery();
    $query->condition('entity_type', $entity->getEntityTypeId())
      ->condition('entity_id', $entity->id());

    if (!empty($flag)) {
      $query->condition('flag_id', $flag->id());
    }

    $ids = $query->execute();
    // Load the flaggings.
    $flaggings = $this->getFlaggingsByIds($ids);

    $user_ids = [];
    foreach ($flaggings as $flagging) {
      $user_ids[] = $flagging->get('uid')->first()->getValue()['target_id'];
    }

    return $this->entityTypeManager->getStorage('user')
      ->loadMultiple($user_ids);
  }

  /**
   * {@inheritdoc}
   */
  public function flag(FlagInterface $flag, EntityInterface $entity, AccountInterface $account = NULL, $session_id = NULL) {
    $bundles = $flag->getBundles();

    $this->ensureSession();
    $this->populateFlaggerDefaults($account, $session_id);

    // Check the entity type corresponds to the flag type.
    if ($flag->getFlaggableEntityTypeId() != $entity->getEntityTypeId()) {
      throw new \LogicException('The flag does not apply to entities of this type.');
    }

    // Check the bundle is allowed by the flag.
    if (!empty($bundles) && !in_array($entity->bundle(), $bundles)) {
      throw new \LogicException('The flag does not apply to the bundle of the entity.');
    }

    // Check whether there is an existing flagging for the combination of flag,
    // entity, and user.
    if ($flag->isFlagged($entity, $account, $session_id)) {
      throw new \LogicException('The user has already flagged the entity with the flag.');
    }

    $flagging = $this->entityTypeManager->getStorage('flagging')->create([
      'uid' => $account->id(),
      'session_id' => $session_id,
      'flag_id' => $flag->id(),
      'entity_id' => $entity->id(),
      'entity_type' => $entity->getEntityTypeId(),
      'global' => $flag->isGlobal(),
    ]);

    $flagging->save();

    return $flagging;
  }

  /**
   * {@inheritdoc}
   */
  public function unflag(FlagInterface $flag, EntityInterface $entity, AccountInterface $account = NULL, $session_id = NULL) {
    $bundles = $flag->getBundles();

    $this->populateFlaggerDefaults($account, $session_id);

    // Check the entity type corresponds to the flag type.
    if ($flag->getFlaggableEntityTypeId() != $entity->getEntityTypeId()) {
      throw new \LogicException('The flag does not apply to entities of this type.');
    }

    // Check the bundle is allowed by the flag.
    if (!empty($bundles) && !in_array($entity->bundle(), $bundles)) {
      throw new \LogicException('The flag does not apply to the bundle of the entity.');
    }

    $flagging = $this->getFlagging($flag, $entity, $account, $session_id);

    // Check whether there is an existing flagging for the combination of flag,
    // entity, and user.
    if (!$flagging) {
      throw new \LogicException('The entity is not flagged by the user.');
    }

    $flagging->delete();
  }

  /**
   * {@inheritdoc}
   */
  public function unflagAllByFlag(FlagInterface $flag) {
    $query = $this->entityTypeManager->getStorage('flagging')->getQuery();

    $query->condition('flag_id', $flag->id());

    $ids = $query->execute();

    $flaggings = $this->getFlaggingsByIds($ids);

    $this->entityTypeManager->getStorage('flagging')->delete($flaggings);
  }

  /**
   * {@inheritdoc}
   */
  public function unflagAllByEntity(EntityInterface $entity) {
    $query = $this->entityTypeManager->getStorage('flagging')->getQuery();

    $query->condition('entity_type', $entity->getEntityTypeId())
      ->condition('entity_id', $entity->id());

    $ids = $query->execute();

    $flaggings = $this->getFlaggingsByIds($ids);

    $this->entityTypeManager->getStorage('flagging')->delete($flaggings);
  }

  /**
   * {@inheritdoc}
   */
  public function unflagAllByUser(AccountInterface $account, $session_id = NULL) {
    $query = $this->entityTypeManager->getStorage('flagging')->getQuery();
    $query->condition('uid', $account->id());

    if ($account->isAnonymous()) {
      if (empty($session_id)) {
        throw new \LogicException('An anonymous user must be identified by session ID.');
      }

      $query->condition('session_id', $session_id);
    }

    $ids = $query->execute();

    $flaggings = $this->getFlaggingsByIds($ids);

    $this->entityTypeManager->getStorage('flagging')->delete($flaggings);
  }

  /**
   * {@inheritdoc}
   */
  public function userFlagRemoval(UserInterface $account) {
    // Remove flags by this user.
    $this->unflagAllByUser($account);

    // Remove flags that have been done to this user.
    $this->unflagAllByEntity($account);
  }

  /**
   * Loads flag entities given their IDs.
   *
   * @param int[] $ids
   *   The flag IDs.
   *
   * @return \Drupal\flag\FlagInterface[]
   *   An array of flags.
   */
  protected function getFlagsByIds(array $ids) {
    return $this->entityTypeManager->getStorage('flag')->loadMultiple($ids);
  }

  /**
   * Loads flagging entities given their IDs.
   *
   * @param int[] $ids
   *   The flagging IDs.
   *
   * @return \Drupal\flag\FlaggingInterface[]
   *   An array of flaggings.
   */
  protected function getFlaggingsByIds(array $ids) {
    return $this->entityTypeManager->getStorage('flagging')->loadMultiple($ids);
  }

}
