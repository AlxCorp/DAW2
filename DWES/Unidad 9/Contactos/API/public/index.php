<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

// Cargamos Autoload
require_once('../vendor/autoload.php');

// Cargamos Dotenv
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

session_start();
if (!isset($_SESSION['loginId'])) {
    $_SESSION['loginId'] = 'guest';
    //$_SESSION['loginId'] = 'admin';
}

//echo($_SESSION['loginId']);

// Cargamos Router
require_once('../app/config/routes.php');

// echo($_ENV['DB_HOST']);
?>
