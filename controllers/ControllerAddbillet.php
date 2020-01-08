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
    
    $this->_view = new View('Addbillet');
    $this->_view->generate(array());

    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    if (!is_null($auteur) AND !is_null($titre) AND !is_null($contenu)){
    $this->_billetManager = new BilletManager();
    $billet = $this->_billetManager->create('billets', 'BILLET');
    }

  
  }
}
