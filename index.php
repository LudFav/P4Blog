<?php
// instanciation du routeur et on utilise la methode routeReq qui va choisir le bon controller selon l'url

require_once($_SERVER["DOCUMENT_ROOT"]. '/P4Blog/controllers/Router.php');

$router = new Router();

$router->routeReq();
?>
