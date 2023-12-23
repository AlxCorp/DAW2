<?php
// Cargamos Autoload
require_once('../vendor/autoload.php');

// Cargamos Router
require_once('../app/config/routes.php');

// Cargamos Dotenv
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// echo($_ENV['DB_HOST']);
?>