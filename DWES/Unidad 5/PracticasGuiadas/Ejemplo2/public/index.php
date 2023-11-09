<?php 
require_once("../app/Config/config.php");
require_once("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\IndexController;

$router = new Router();
$controller = new IndexController();

$router->add([
    "name" => "home",
    "path" => "/^\/$/",
    "action" => [IndexController::class, "IndexAction"],
]);

$request = str_replace(DIRBASEURL, "", $_SERVER["REQUEST_URI"]);
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo("kk");
}
?>