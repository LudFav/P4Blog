<?php


class ControllerLogin {
    private $_userManager;
    private $_view;
  
    public function __construct(){
  
    $this->_userManager = new UserManager; 
    $this->login();
    $this->isLoggedIn();
   // $this->logout();
    
  }
  public function login(){
    if(isset($_POST['action']) && $_POST['action'] == 'login'){  
      $userInfo = $this->_userManager->getUser();
      //$passToHash = password_hash('admin', PASSWORD_DEFAULT, ['cost' => 12]);
      if(isset($_POST['username']) && isset($_POST['password'])){
        $username = htmlspecialchars($_POST['username']);
      
        $passwordSubmitted = htmlspecialchars($_POST['password']);
        $passwordHashed = $userInfo[0]->password();
        $password= password_verify($passwordSubmitted, $passwordHashed);
      
        if($_POST['username'] == $userInfo[0]->username() && $password == true){
          $_SESSION['admin'] = $username;
        } else {
          echo "Erreur : Erreur de login </br>";
        }
      }
    }
  }
public function isLoggedIn(){
  if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
    //$loginOutput='';
    //$loginOutput .= '<li><a href="admin">Administration</a></li>';
    //$data['loginOutput'] = $loginOutput;
    print 'Active';
    //exit($data['loginOutput']);
  }
}
  public function logout(){
  if(isset($_POST['action']) && $_POST['action'] == 'logout'){
    unset($_SESSION['admin']);   
    session_destroy();
    echo "window.location.href='accueil'";
    exit;
  }
}
} 
?>