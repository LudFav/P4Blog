<?php

require_once 'views/View.php';

class ControllerAdmin{
    
    private $_view;
    public function __construct(){

      //VUE
      $this->_view = new View('Admin'); 
      $this->_view->generateAdmin(array());  
    }
}