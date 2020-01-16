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
       
        
        $this->_billetManager = new BilletManager;
        $billets = $this->_billetManager->getBillets();
        if (isset($_GET['id'])) {
          $this->_billetManager = new BilletManager;
          $deleteBillet = $this->_billetManager->deleteBillet($_GET['id']);
          header('Location:admin');
        }

        $this->_commentManager = new CommentManager;
        $commentaires = $this->_commentManager->getSignaledComments('commentaires', 'Comment', $signale=null);
        if(isset($_POST['unSignal'])){
          $unSignalComment = $this->_commentManager->unsignaleComment($_POST['unSignal']);
          header('Location:admin');
        }

        if(isset($_POST['modere'])){
          $modereComment = $this->_commentManager->modereComment($_POST['modere']);
          header('Location:admin');
        }

        if (isset($_POST['delete'])) {
          $deleteComment = $this->_commentManager->deleteComment($_POST['delete']);
          header('Location:admin');
        }

      $this->_view = new View('Admin');
      $this->_view->generate(array('billets' => $billets, 'commentaires' => $commentaires ));  
    }
}