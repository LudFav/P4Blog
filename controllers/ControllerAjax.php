<?php

class ControllerAjax {
  
  private $_commentManager;

  public function __construct(){
      $this->signalRequest();
  }

  private function signalRequest(){

      if(isset($_POST['idSignal'])){
        $signaleCom = $this->_commentManager->signaleComment($_POST['idSignal']); 
        echo "ok";  
      } else {
      echo "nope";
      }
    
    }
  }
}