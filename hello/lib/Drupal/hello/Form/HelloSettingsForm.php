<?php

/**
 * @file
 * Contains \Drupal\hello\Form\HelloSettingsForm.
 */

namespace Drupal\hello\Form;

use Drupal\Core\Form\ConfigFormBase;

/**
 * Configure Hello settings for this site.
 */
class HelloSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'hello_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    //$hello_config = \Drupal::config('hello.settings');
    $hello_config = $this->config('hello.settings');

    $form['message'] = array(
      '#type' => 'textfield',
      '#title' => t('Message'),
      '#default_value' => $hello_config->get('message'),
      '#maxlength' => 255,
      '#description' => t('Enter a message to be displayed in the /hello-message callback.'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    $this->config('hello.settings')
      ->set('message', $form_state['values']['message'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
