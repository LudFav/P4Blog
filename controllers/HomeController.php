<?php

class HomeController{
    private = $_billetManager;
    private $_view;
    public function __construct($url){
        if(isset($url) && count($urm)> 1){
            throw new \Exception("Page introuvable", 1);
        } else {
            $this->billets();
        }
    }

    private function billets(){
        $this->_billetManager = new BilletManager();
        $billets = $this->_billetManager->getBillet();
        require_once('HomeView.php'); // à securiser
    }
}