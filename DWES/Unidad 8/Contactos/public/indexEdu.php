<?php
use App\Controllers\AuthController;
require("../vendor/autoload.php");

use App\Controllers\contactosController;
use App\Core\Router;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS"){
    die();
}

$request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = explode("/", $request);

$id = null;
if(isset($uri[2])){
    $id = (int) $uri[2];
}
if($request == "/login"){
    $auth = new AuthController($method);
    if(!$auth->loginFromRequest()){
        exit(http_response_code(401));
    };
}

$input = (array) json_decode(file_get_contents("php://input"), TRUE);
$autHeader = $_SERVER["HTTP_AUTHORIZATION"];
$arr = explode(" ",$autHeader);
$jwt = $arr[1];

if($jwt){
    try{
        $decode = (JWT::decode($jwt, new Key(KEY,"HS256")));
    }
    catch (Exception $e){
        echo json_encode(array(
            "message" => "Access denied",
            "error" => $e->getMessage()
        ));
        exit (http_response_code(401));
    }
}

$router = new Router();
$router->add(array(
    "name" => "home",
    "path" => "/^\/contactos\/([0-9]+)?$/",
    "action" =>contactosController::class),
);
$route = $router->match($request);
if($route){
    $controllerName = $route[0]["action"];
    $controller = new $controllerName($method,$id);
    $controller->processRequest();
}
else{
    $response["status_code_header"] = "HTTP/1.1 404 Not Found";
    $response["body"] = null;
    echo json_encode($response);
}
