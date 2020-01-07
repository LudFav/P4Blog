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

     
    if(isset($_POST['auteur'])){
        $data['auteur'] = $_POST['auteur'];
    }  else {
        $data['auteur'] = NULL;
    }
    if(isset($_POST['titre'])){
        $data['titre'] = $_POST['titre'];
    }  else {
        $data['titre'] = NULL;
    }
    if(isset($_POST['contenu'])){
        $data['contenu'] = $_POST['contenu'];
    }  else {
        $data['contenu'] = NULL;
    }
    $this->_billetManager = new BilletManager();
    $add = $this->_billetManager->create('billets', 'BILLET', $data);
    

  
  }
}
