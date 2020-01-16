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

  //BILLETS  
    if (isset($_GET['id'])) {
      /**
     * Billets a montrer
     */
      $this->_billetManager = new BilletManager;
      $billet = $this->_billetManager->getBillet($_GET['id']);
      

  //COMMENTAIRES  
      $this->_commentManager = new CommentManager;
    
        /**
     * Commentaires a montrer
     */
      $commentaires = $this->_commentManager->getComments($_GET['id']);

        /**
     * Inserer commentaires 
     */
      if(isset($_POST['addComment'])){
        $data = array(
            'billetId' => $_GET['id'],
            'auteur' => htmlspecialchars($_POST['auteur']),
            'contenu' => htmlspecialchars($_POST['contenu']),
        );
        $addComment = $this->_commentManager->createComment($data, $data['billetId']);
        header('Location:post&id=' .$_GET['id']. '');
        exit;
      }
        /**
     * Commentaires a montrer
      */
        if(isset($_POST['idSignal'])){
        $signaleCom = $this->_commentManager->signaleComment($_POST['idSignal']);   
      }

    //VUE
        /**
     * Generation de la vue 
     */
    $this->_view = new View('SinglePost');
    $this->_view->generate(array('billet' => $billet, 'commentaires' => $commentaires )); 
    }
  }
}

