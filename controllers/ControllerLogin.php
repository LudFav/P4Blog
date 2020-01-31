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
      if($_POST['username'] == $userInfo[0]->username()){
        echo "Votre pseudo est OK";
      } else {
        echo "Erreur : Mauvais pseudonyme </br>";
      }
    $passwordSubmitted = $_POST['password'];
    $passwordHashed = $userInfo[0]->password();
    $password= password_verify($passwordSubmitted, $passwordHashed);
    
      if($password == true){
        echo "Votre mot de passe est OK";
      } else {
        echo "Erreur : Mauvais mot de passe";
      }
    }
  }

  public function logout() {

  }
} 
?>