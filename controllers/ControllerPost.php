<?php
require_once 'views/View.php';

class ControllerPost {
  private $_billetManager;
  private $_view;

  public function __construct(){
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    } else {
      $this->billet();
    }
  }

  private function billet(){
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);
      $this->_view = new View('SinglePost');
      $this->_view->generate(array('billet' => $billet));
    }
  }

  private function comment(){
    if (isset($_GET[''])){}
  }
}

