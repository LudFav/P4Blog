<?php
require_once 'views/View.php';

class ControllerPost {
  private $_billetManager;
  private $_view;

  public function __construct(){
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    } else {
      $this->post();    
    }
  }

  private function post(){

  //BILLETS  
    if (isset($_GET['id'])) {
      /**
     * Billets a montrer
     */
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);
      


    //VUE
        /**
     * Generation de la vue 
     */
    $this->_view = new View('SinglePost');
    $this->_view->generate(array('billet' => $billet)); 
    }
  }
}

