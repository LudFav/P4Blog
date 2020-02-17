<?php

require_once 'views/View.php';
require_once 'controllers/ajaxClientPhp/ajaxClientBillet.php';
require_once 'controllers/ajaxClientPhp/ajaxClientCom.php';

class ControllerAccueil{
  private $_view;
  public function __construct(){
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->_view = new View('Accueil');
      if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
      $this->_view->generateAdmin(array());
      } else {
        $this->_view->generate(array());
      }
    } 
  }
}

