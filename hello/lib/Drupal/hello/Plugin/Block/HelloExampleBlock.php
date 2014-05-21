<?php

/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloExampleBlock.
 */

namespace Drupal\hello\Plugin\Block;

use Drupal\block\BlockBase;				  // Inherit the base class of block	
use Drupal\Component\Annotation\Plugin;   // Will Show the module listing on block listing page
use Drupal\Core\Session\AccountInterface; // Provide user interface like block configuration will open in lightbox.

/**
 * Provides a simple block.
 *
 * @Block(
 *   id = "helloModule_block",
 *   admin_label = @Translation("Hello Block"),
 *   category = @Translation("Custom"),
 * )
 */
class HelloExampleBlock extends BlockBase {

  /**
   * Implements \Drupal\block\BlockBase::access().
   */
  public function access(AccountInterface $account) {
    return $account->hasPermission('access content');
  }	

  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {
    $hello_settings = \Drupal::config('hello.settings');
    $message = $hello_settings->get('message');
    $message .= '<br><a href="/admin/config/hello-index/hello-setting" target="_blank">Click here to change message</a>';
    return array(
      //'#title' => 'testing123',
      '#children' => $message,
    );
  }
  
}
