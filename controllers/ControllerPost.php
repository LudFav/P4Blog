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
 
      $this->_commentManager = new CommentManager;
      $commentaires = $this->_commentManager->getComments($_GET['id']);
   
      $this->_view->generate(array('billet' => $billet, 'commentaires' => $commentaires));
    } 
  }
/*
  private function billet(){
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);
      $this->_view = new View('SinglePost');
      $this->_view->generate(array('billet' => $billet), array('commentaires' => $commentaires) );
    }
  }

  private function commentaires(){
    var_dump('commentaires');
    if (isset($_GET['id'])){
      $this->_commentManager = new CommentManager;

      $commentaires = $this->_commentManager->getComments($_GET['id']);
      echo '<pre>';
      var_dump($commentaires);
      echo '</pre>';
      $this->_view->generate(array('commentaires' => $commentaires));
    }
  }
*/

}

