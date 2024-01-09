<?php
// Cargamos Autoload
require_once('../vendor/autoload.php');

// Cargamos Dotenv
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// Cargamos Router
require_once('../app/config/routes.php');

// echo($_ENV['DB_HOST']);
?>