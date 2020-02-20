<?php


class ControllerLogin {
    private $_userManager;
    private $_view;
  
    public function __construct(){
  
    $this->_userManager = new UserManager; 
    $this->login();
    $this->isLoggedIn();
    $this->logout();
    
  }
  public function login(){
    if(isset($_POST['action']) && $_POST['action'] == 'login'){  
      $userInfo = $this->_userManager->getUser();
      //$passToHash = password_hash('admin', PASSWORD_DEFAULT, ['cost' => 12]);
      //var_dump($passToHash);
      //$2y$12$d6saXiDFegaG6kPyYQYWROryvOPaMK45wyVPHqR0cj2y7iDsIgj/2
      if(isset($_POST['username']) && isset($_POST['password'])){
        $username = htmlspecialchars($_POST['username']);
      
        $passwordSubmitted = htmlspecialchars($_POST['password']);
        $passwordHashed = $userInfo[0]->password();
        $password= password_verify($passwordSubmitted, $passwordHashed);
      
        if($_POST['username'] == $userInfo[0]->username() && $password == true){
          $_SESSION['admin'] = $username;
          $link = "admin";
          echo $link;
        } else {
          echo "Erreur : Erreur de login </br>";
        }
      }
    }
  }
public function isLoggedIn(){
  if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
    if(isset($_POST['action']) && $_POST['action'] == 'isLogged'){
    $logged = true;
    echo $logged;
    }
  }
}
  public function logout(){
  if(isset($_POST['action']) && $_POST['action'] == 'logout'){
    session_unset();   
    session_destroy();
    $link = "accueil";
    echo $link;
    exit;
  }
}
} 
?>