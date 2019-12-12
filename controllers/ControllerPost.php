<?php
require_once 'views/View.php';

class ControllerPost {
  private $_billetManager;
  private $_commentManager;
  private $_view;

  public function __construct(){
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    } else {
      $this->post();
      //$this->billet();
      //$this->commentaires();
     
    }
  }

  private function post(){
    $this->_view = new View('SinglePost');
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);
      $this->_view->generate(array('billet' => $billet));
    }
    
      $this->_commentManager = new CommentManager;
      $comments = $this->_commentManager->getComments();
      $this->_view->generate(array('comments' => $comments));
     
  }
/* 
  private function billet(){
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);
      $this->_view = new View('SinglePost');
      $this->_view->generate(array('billet' => $billet));
    }
  }

  private function commentaires(){
    if (isset($_GET['billetId'])){
      $this->_commentManager = new CommentManager;
      $comment = $this->_commentManager->getComments($_GET['billetId']);
      $this->_view->generate(array('commentaires' => $commentaires));
    }
  }

*/
}

