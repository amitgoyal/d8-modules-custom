<?php

/**
 * @file
 * Contains \Drupal\hello\Access\HelloAccessCheck.
 */

namespace Drupal\hello\Access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Determines access to routes based on login status of current user.
 */
class HelloAccessCheck implements AccessInterface {

  /**
   * Checks access.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The currently logged in account.
   *
   * @return string
   *   A \Drupal\Core\Access\AccessInterface constant value.
   */
  public function access(Request $request, AccountInterface $account) {
    return $account->isAuthenticated() ? static::ALLOW : static::DENY;
  }

}
