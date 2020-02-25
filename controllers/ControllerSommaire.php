<?php
require_once $_SERVER["DOCUMENT_ROOT"]. '/PROJET4-MVC-OOP-PHP/views/View.php';
require_once $_SERVER["DOCUMENT_ROOT"]. '/PROJET4-MVC-OOP-PHP/controllers/ajaxClientPhp/ajaxClientBillet.php';
require_once $_SERVER["DOCUMENT_ROOT"]. '/PROJET4-MVC-OOP-PHP/controllers/ajaxClientPhp/ajaxClientCom.php';

class ControllerSommaire{
  private $_view;
  public function __construct(){
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->_view = new View('sommaire');
      if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
      $this->_view->generateAdmin(array());
      } else {
        $this->_view->generate(array());
      }
    } 
  }
}
