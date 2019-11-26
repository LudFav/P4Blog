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
                // on decompose l'url et on lui applique le filtre FILTER_SANITIZE_URL qui supprime tous les caractères d'URL illégales d'une chaîne 
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL))
                $controller = ucfirst(strtolower($url[0]));// on veille à ne mettre que la premiere lettre de notre 1er item d'url en majuscule.
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                //verification que le fichier du controleur existe
                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url)
                } else {
                    throw new \Exception("Page introuvable")
                }
            } else {
                require_once('controllers/ControllerHome.php')
                $this->ctrl = new ControllerHome($url)
            }
        } catch(\Exception $e){
            $errorMessage = $e->getMessage();
            require_once('views/viewError.php');
        }
    }
}