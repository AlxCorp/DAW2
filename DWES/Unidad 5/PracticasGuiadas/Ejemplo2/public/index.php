<?php 
require_once("../app/Config/config.php");
require_once("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\NumberController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$router = new Router();

$router->add([
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction'],
]);

$router->add([
    'name' => 'saludo',
    'path' => '/^\/saludo\/[A-z]+$/',
    'action' => [IndexController::class, 'SaludaAction'],
]);

$router->add([
    'name' => 'pares',
    'path' => '/^\/pares\/\d+$/',
    'action' => [NumberController::class, 'NumberAction'],
]);

$request = str_replace(DIRBASEURL, "", $_SERVER["REQUEST_URI"]);
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo("No hay ruta");
}
?>