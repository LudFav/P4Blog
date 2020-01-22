<?php


class ControllerLogin {
    private $_userManager;
    private $_view;
  
    public function __construct(){
  
    $this->_userManager = new UserManager;
    if(isset($_POST['action']) && $_POST['action']=='login'){
    var_dump($_POST['username']);
    var_dump($_POST['password']);
    }
    
    
  }
  
} 
?>