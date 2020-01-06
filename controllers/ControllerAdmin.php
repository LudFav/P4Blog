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
        $this->_billetManager = new BilletManager;
        $billets = $this->_billetManager->getBillets();
   
        $this->_commentManager = new CommentManager;
        $commentaires = $this->_commentManager->getSignaledComments('commentaires', 'Comment', $signale=null);
     
      $this->_view->generate(array('billets' => $billets, 'commentaires' => $commentaires ));  
    }
}