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
    $this->_billetManager = new BilletManager();
    
        $billets = $this->_billetManager->create('billets', 'Billet');
  
  }
}
