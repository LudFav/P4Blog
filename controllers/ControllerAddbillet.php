<?php

require_once 'views/View.php';

class ControllerAddbillet
{
  private $_billetManager;
  private $_view;

  public function __construct()
  {
    
    $this->addBillet();
    echo "something";
  
  }

  private function addBillet(){
    $this->_view = new View('Addbillet');
    $this->_billetManager = new BilletManager();
    if($_POST){
        $billets = $this->_billetManager->create('billets', 'Billet');
    }  
  }
}
