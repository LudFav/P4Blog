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
    }
  }

  private function post(){
    $this->_view = new View('SinglePost');
    if (isset($_GET['id'])) {
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);

      $data = array(
        'auteur' => isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : NULL,
        'contenu' => isset($_POST['contenu']) ? htmlspecialchars($_POST['contenu']) : NULL
        );
      $this->_commentManager = new CommentManager;
      $addComment = $this->_commentManager->createComment($_GET['id'], $data);
      $commentaires = $this->_commentManager->getComments($_GET['id']);
      
   
    $this->_view->generate(array('billet' => $billet, 'commentaires' => $commentaires ));
    } 
  }
}

