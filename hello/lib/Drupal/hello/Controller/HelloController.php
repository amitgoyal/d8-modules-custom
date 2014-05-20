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

}
