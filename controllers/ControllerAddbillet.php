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
    'auteur' => !empty($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : " ",
    'titre' => isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : " ",
    'contenu' => isset($_POST['contenu']) ? $_POST['contenu'] : " "
    );
    $this->_billetManager = new BilletManager();
    $billets = $this->_billetManager->createBillet($data);
  }
}
