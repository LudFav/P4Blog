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
    $data = array(
    'auteur' => isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : NULL,
    'titre' => isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : NULL,
    'contenu' => isset($_POST['contenu']) ? $_POST['contenu'] : NULL
    );
    $this->_billetManager = new BilletManager();
    $billets = $this->_billetManager->createBillet($data);
  }
}
