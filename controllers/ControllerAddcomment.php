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
    if(isset($_POST['add'])){
        $data = array(
            'billetId' => $_GET['id'];
            'auteur' => htmlspecialchars($_POST['auteur']),
            'contenu' => htmlspecialchars($_POST['contenu']),
        );
    $addComment = $this->_commentManager->createComment($data);
    }
  }
}

