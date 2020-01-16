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
       
        //BILLET
        $this->_billetManager = new BilletManager;
        $billets = $this->_billetManager->getBillets();
        if (isset($_POST['deleteBillet'])){
          $deleteBillet = $this->_billetManager->deleteBillet($_POST['deleteBillet']);
        }


        //COMMENT
        $this->_commentManager = new CommentManager;
        $commentaires = $this->_commentManager->getSignaledComments('commentaires', 'Comment', $signale=null);
        if(isset($_POST['unSignal'])){
          $unSignalComment = $this->_commentManager->unsignaleComment($_POST['unSignal']);  
        }

        if(isset($_POST['modere'])){
          $modereComment = $this->_commentManager->modereComment($_POST['modere']);  
        }

        if (isset($_POST['deleteCom'])) {
          $deleteComment = $this->_commentManager->deleteComment($_POST['deleteCom']);
          
        }
      //VUE
      $this->_view = new View('Admin');
      $this->_view->generate(array('billets' => $billets, 'commentaires' => $commentaires ));  
    }
}