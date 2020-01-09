<?php

require_once 'views/View.php';

class ControllerAddcomment
{
  private $_commentManager;
  private $_view;

  public function __construct()
  {
    $this->addComment();
  }

  private function addComment(){
    
    $this->_view = new View('Addcomment');
    $this->_view->generate(array());
    $data = array(
        'billetId' => isset($_GET['id']) ? $_GET['id'] : NULL,
        'auteur' => !empty($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : " ",
        'contenu' => !empty($_POST['contenu']) ? htmlspecialchars($_POST['contenu']) : " "
        );
    $this->_commentManager = new CommentManager();
    $comment = $this->_commentManager->createComment($data);
  }
}

