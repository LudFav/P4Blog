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
    echo " something1 ";
    $this->_view = new View('Addbillet');
    echo " something2 ";
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
