<?php
session_start();
class View
{
  //fichier a envoyer a la vue
  private $_file;

  //titre de la page
  private $_t;

  function __construct($action){
    $this->_file = 'views/view'.$action.'.php';
  }

  //crée une fonction qui va générer et afficher la vue
  public function generate($data){
    //définir le contenu à envoyer
    $content = $this->generateFile($this->_file, $data);
    $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }
  public function generateAdmin($data){
    $content = $this->generateFile($this->_file, $data);
    $view = $this->generateFile('views/templateAdmin.php', array('t' => $this->_t, 'content' => $content ));
    echo $view; 
  }

  private function generateFile($file, $data){
    if (file_exists($file)) {
     
      extract($data);

      //commencer la temporisation
      ob_start();

      require $file;

      //arreter la temporisation
     return ob_get_clean();
    }
    else {
      throw new \Exception("Fichier ".$file." introuvable", 1);

    }
  }












}









 ?>
