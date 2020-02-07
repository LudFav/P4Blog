<?php


class ControllerLogin {
    private $_userManager;
    private $_view;
  
    public function __construct(){
  
    $this->_userManager = new UserManager;
    $this->login(); 
  }
    
  public function login() {
    $userInfo = $this->_userManager->getUser();
    //$passToHash = password_hash('admin', PASSWORD_DEFAULT, ['cost' => 12]);
    if(isset($_POST['action']) && $_POST['action']=='login'){
      var_dump($userInfo);
      $username = htmlspecialchars($_POST['username']);
      var_dump($username);
      $passwordSubmitted = htmlspecialchars($_POST['password']);
      $passwordHashed = $userInfo[0]->password();
      $password= password_verify($passwordSubmitted, $passwordHashed);
      var_dump($password);
      if($_POST['username'] == $userInfo[0]->username() && $password == true){
        $_SESSION['admin'] = $username;
        var_dump($_SESSION['admin']);
        echo " Bienvenue $username";
      } else {
        echo "Erreur : Erreur de login </br>";
      }
    }
  }

  public function logout() {

  }
} 
?>