<?php
require_once 'libs/routerBase.php';
require_once 'app/controllers/itemsApiController.php';

$router = new Router();

// tabla de ruteo
$router->addRoute('jugadores', "GET", 'itemsApiController', 'getJugadores');
$router->addRoute('jugadores/:ID', "GET", 'itemsApiController', 'getjugador');
$router->addRoute('jugadores/:ID', "DELETE", 'itemsApiController', 'deletedjugador');
$router->addRoute('jugadores', "POST", 'itemsApiController', 'addjugador');
$router->addRoute('jugadores/:ID', "PUT", 'itemsApiController', 'updatejugador');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);






