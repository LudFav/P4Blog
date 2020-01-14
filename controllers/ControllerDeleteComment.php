<?php

require_once 'views/View.php';

class ControllerDeleteComment {
  private $_commentManager;
  private $_view;

  public function __construct(){
    if (isset($url) && count($url) < 1) {
        throw new \Exception("Page Introuvable");
    } else {
    $this->dltComMethod();
    }
  }

  private function dltComMethod(){
    if (isset($_GET['id'])) {
        $this->_commentManager = new CommentManager;
        $deleteComment = $this->_commentManager->deleteComment($_GET['id']);
        header('Location:admin');
    }
  }

}