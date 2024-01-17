<?php

require "../bootstrap.php";

use App\Controllers\ContactosController;
use App\Core\Router;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode('/', $request);

$Id = null;
if (isset($uri[2])) {
    $Id = (int) $uri[2];
}

$router = new Router();

$router->add(
    array(
        'name' => 'home',
        'path' => '/^\/contactos\/([0-9]+)?$/',
        'action' => ContactosController::class
    ),
);

$route = $router -> match($request);
if ($route){
    $controllerName = $route['action'];
    $controller = new $controllerName($requestMethod, $Id);
    $controller->processRequest();
    
} else {
$response ['status_code_header'] = 'HTTP/1.1 404 Not Found';
$response ['body'] = null;
echo json_encode($response);
}