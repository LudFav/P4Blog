<?php

require_once 'views/View.php';

class ControllerAddbillet
{
  private $_billetManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);

    }
    else {
      $this->billets();
    }
  }

  private function billets(){
    $this->_billetManager = new BilletManager();
    $billets = $this->_billetManager->create('billets', 'Billet');
    $this->_view = new View('Addbillet');
  }
}
