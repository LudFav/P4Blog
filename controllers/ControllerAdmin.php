<?php

require_once 'views/View.php';

class ControllerAdmin{
    
    private $_view;
    public function __construct(){
      if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
        $this->_view = new View('Admin'); 
        $this->_view->generateAdmin(array());  
    }
  }
}