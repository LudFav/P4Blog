<?php

require_once 'views/View.php';

class ControllerDelete {
  private $_billetManager;
  private $_view;

  public function __construct(){
    if (isset($url) && count($url) < 1) {
        throw new \Exception("Page Introuvable");
    } else {
    $this->dltBillet();
    }
  }

  private function dltBillet(){
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $deleteBillet = $this->_billetManager->deleteBillet($_GET['id']);
      header('Location:admin');
    }
  }
}
