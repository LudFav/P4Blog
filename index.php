<?php

require_once($_SERVER["DOCUMENT_ROOT"]. '/PROJET4-MVC-OOP-PHP/controllers/Router.php');
/*
require_once('views/View.php');
$bol  = is_file('views/View.php');
if ( $bol == 1){
    echo 'fichier existe</br>';
} else {
    echo 'fichier non existant';
}

require_once('controllers/ControllerAccueil.php');
$bol2 = is_file('controllers/ControllerAccueil.php');
if ( $bol2 == 1){
    echo 'fichier 2 existe</br>';
} else {
    echo 'fichier  2 non existant</br>';
}


require_once('controllers/ajaxClientPhp/ajaxClientBillet.php');
$bol3 = is_file('controllers/ajaxClientPhp/ajaxClientBillet.php');
if ( $bol3 == 1){
    echo 'fichier 3 existe</br>';
} else {
    echo 'fichier  3 non existant</br>';
}
/*
require_once('controllers/ControllerAddBillet.php');
echo 'ControllerAddBillet.php' .is_file('controllers/ControllerAddBillet.php');

require_once('controllers/ControllerAdmin.php');
echo 'ControllerAdmin.php' .is_file('controllers/ControllerAdmin.php');

require_once('controllers/ControllerLogin.php');
echo 'ControllerLogin.php' .is_file('controllers/ControllerLogin.php');

require_once('controllers/ControllerPost.php');
echo 'ControllerPost.php' .is_file('controllers/ControllerPost.php');

require_once('controllers/ControllerUpdate');
echo 'ControllerUpdate' .is_file('controllers/ControllerUpdate');

require_once('controllers/ajaxClientPhp/ajaxClientBillet.php');
echo 'ajaxClientBillet' .is_file('controllers/ajaxClientPhp/ajaxClientBillet.php');

require_once('controllers/ajaxClientPhp/ajaxClientCom.php');
echo 'ajaxClientCom' .is_file('controllers/ajaxClientPhp/ajaxClientCom.php');

require_once('controllers/ajaxClientPhp/ajaxClientBillet.php');
echo 'ajaxClientBillet' .is_file('controllers/ajaxClientPhp/ajaxClientBillet.php');

require_once('controllers/ajaxAdminPhp/ajaxAdminBillet.php');
echo 'ajaxAdminBillet' .is_file('controllers/ajaxAdminPhp/ajaxAdminBillet.php');

require_once('controllers/ajaxAdminPhp/ajaxAdminComSign.php');
echo 'ajaxAdminComSign' .is_file('controllers/ajaxAdminPhp/ajaxAdminComSign.php');*/

$router = new Router();

$router->routeReq();
?>
