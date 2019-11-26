<?php

class Router {
    private $ctrl;
    private $view;

    //chargement auto des classes du dossier models
    public function routeUrl(){
        try {
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });
        // creation de la variable $url et determinier un controleur en fonction de la valeur de cette variable
            $url = '';

            if(isset($_GET['url'])){
                // on decompose l'url et on lui applique le filtre FILTER_SANITIZE_URL 
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL))
            }
        } catch(){

        }
    }
}