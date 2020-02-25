<?php

require_once('controllers/Router.php');

/*
require_once('controllers/ControllerAccueil.php');
echo 'ControllerAccueil.php' .is_file('controllers/ControllerAccueil.php');

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
