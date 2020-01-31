<?php

require_once 'views/View.php';

class ControllerUpdate {
  private $_billetManager;
  private $_view;

  public function __construct(){
    if (isset($url) && count($url) < 1) {
        throw new \Exception("Page Introuvable");
    } else {
    $this->updtBillet();
    }
  }

  private function updtBillet(){
    
    
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $billetToUpdate = $this->_billetManager->getBillet($_GET['id']);
      
      if(isset($_POST['updateBillet'])){
        $data = array(
        'titre' => htmlspecialchars($_POST['titre']),
        'contenu' =>  $_POST['contenu']
        );
        $updateBillet = $this->_billetManager->updateBillet($data, $_GET['id']);
        header('Location:admin');
      }
      $this->_view = new View('Update');
      $this->_view->generateAdmin(array('billet' => $billetToUpdate));  
    }
  }
}
