<?php
require_once 'libs/routerBase.php';
require_once 'app/controllers/itemsApiController.php';

$router = new Router();

// tabla de ruteo
$router->addRoute('items', "GET", 'itemsApiController', 'getAllItems');
$router->addRoute('items/:ID', "GET", 'itemsApiController', 'getTarea');
$router->addRoute('items/:ID', "DELETE", 'itemsApiController', 'deletedTarea');
$router->addRoute('items', "POST", 'itemsApiController', 'addtarea');
$router->addRoute('items/:ID', "PUT", 'itemsApiController', 'updatetarea');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);






