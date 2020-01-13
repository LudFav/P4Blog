<?php

require_once 'views/View.php';

class ControllerAddbillet
{
  private $_billetManager;
  private $_view;

  public function __construct()
  {
    $this->addBillet();
  }

  private function addBillet(){
    
    
    if(isset($_POST['add'])){
      $data = array(
      'auteur' => htmlspecialchars($_POST['auteur']),
      'titre' => htmlspecialchars($_POST['titre']),
      'contenu' =>  $_POST['contenu']
      );
      $this->_billetManager = new BilletManager();
      $billets = $this->_billetManager->createBillet($data);
      header('Location:admin');
    }
    $this->_view = new View('Addbillet');
    $this->_view->generate(array());
  }
}
