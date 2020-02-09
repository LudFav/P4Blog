<?php

require_once 'views/View.php';

class ControllerAdmin{
    
    private $_view;
    public function __construct(){
      //VUE
      $this->_view = new View('Admin'); 
      if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){ 
      echo ' test session ok';
      $this->_view->generateAdmin(array());
      } else {
        $this->_view->generate(array());
        echo ' test session non ok';
        header('Location:accueil'); 
      }
    }
}