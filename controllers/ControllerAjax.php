<?php

class ControllerAjax {
  
  private $_commentManager;

  public function __construct(){
      $this->signalRequest();
  }

  private function signalRequest(){
    $signaleCome = $this->_commentManager->signaleComment(49); 
      /*if(isset($_POST['idSignal'])){
        $signaleCom = $this->_commentManager->signaleComment($_POST['idSignal']); 
        echo "ok";  
      } else {
      echo "nope";
      }
    
    }*/
  }
}