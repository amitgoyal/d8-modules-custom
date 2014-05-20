<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
  
  public function welcome() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Hello!'),
    );
  }

  public function world() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Hello World!'),
    );
  }

  public function hello_user($name) {
    $output['#markup'] = $this->t("Hello %name", array('%name' => $name));
    $output['#title'] = "Hello $name";
    return ($output);
  }

}
