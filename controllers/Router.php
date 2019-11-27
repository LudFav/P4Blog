<?php 
class Router {
    private $ctrl;
    private $view;

    public function routeUrl(){
        try {
            //chargement automatique des classes du dossier models
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });
            // creation de la variable $url
            $url='';
            // determine le controller en fonction de la valeur de cette variable
            if(isset($_GET['url'])){
                // on decompose l'url grace a explode et on lui applique un filtre de securité, n'acceptant que les caracteres legaux d'URL
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                // recuperation du premier item de l'url, on s'assure que seule la premiere lettre est en majuscule
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                //chemin du controller voulu
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)){
                    //si $controllerFile existe on lance la class
                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);
                } else {
                    throw new \Exception ("Page Introuvable", 1);
                }
            } else {
                require_once('controllers/HomeController.php');
                $this->ctrl = new HomeController($url);
            }
        } catch(\Exception $e){
            $errorMsf = $e->getMessage();
            require_once('views/ErrorView.php');// pour le moment pas assez securisé
        }
    }
}