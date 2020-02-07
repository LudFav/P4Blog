<?php

require_once 'views/View.php';

class ControllerAdmin{
    
    private $_view;
    public function __construct(){
      //VUE
      $this->_view = new View('Admin');
      if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){ 
      $this->_view->generate(array());
      } else {
        header('Location:accueil'); 
      }  
    }
}