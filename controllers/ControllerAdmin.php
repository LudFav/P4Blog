<?php

require_once 'views/View.php';

class ControllerAdmin{
    private $_billetManager;
    private $_commentManager;
    private $_view;
    public function __construct(){
      $this->tableauDeBord();
    }
  

    private function tableauDeBord(){
        $this->_view = new View('Admin');
        /*
        if (isset($_GET['id'])) {
          $this->_billetManager = new BilletManager;
          $billets = $this->_billetManager->getBillets();
     
          $this->_commentManager = new CommentManager;
          $commentaires = $this->_commentManager->getSignaledComments($_GET['id']);
       
          $this->_view->generate(array('billets' => $billets, 'commentaires' => $commentaires));
        }*/
        echo 'ADMIN'; 
      }
}