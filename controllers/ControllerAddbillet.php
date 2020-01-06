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
    $this->_billetManager = new BilletManager();
    if($_POST){
       
        $billets = $this->_billetManager->create('billets', 'Billet');
        echo " Le billet a été ajouté " ;
    } else {
        echo " Le billet n'a pas été ajouté ";
    } 

    $this->_view->generate(array());
  }
}
