<?php
require_once 'views/View.php';

class ControllerLogin {
    private $_UserManager;
    private $_view;
  
    public function __construct(){
      if (isset($url) && count($url) < 1) {
        throw new \Exception("Page Introuvable");
      } else {
        $this->auth();    
      }
    }
  
    private function auth(){

      $this->_view = new View('login');
    }  
  }
  
  
?>