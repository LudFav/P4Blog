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

    $auteur = isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : NULL;
    $titre = isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : NULL;
    $auteur = isset($_POST['contenu']) ? htmlspecialchars($_POST['contenu']) : NULL;
    $this->_billetManager = new BilletManager();
    $billet = $this->_billetManager->create('billets', 'BILLET');
  }
}
