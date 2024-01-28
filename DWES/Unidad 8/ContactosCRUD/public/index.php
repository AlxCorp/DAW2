<?php
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