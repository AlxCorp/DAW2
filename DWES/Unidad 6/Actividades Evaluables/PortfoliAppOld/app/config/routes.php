<?php

use Alx\Portfoliapp\Entities\Router;
use Alx\Portfoliapp\Controllers\IndexController;
use Alx\Portfoliapp\Controllers\LoginController;
use Alx\Portfoliapp\Controllers\RegisterController;
use Alx\Portfoliapp\Controllers\SearchController;
use Alx\Portfoliapp\Controllers\DashboardController;

Router::get('/', [IndexController::class, 'view']);

Router::get('/registro/validar/:slug', function ($token){
    $RegisterController = new RegisterController();
    return $RegisterController->validateView($token);
});

Router::get('/registro', [RegisterController::class, 'view']);

Router::post('/registro', [RegisterController::class, 'form']);

Router::post('/login', [LoginController::class, 'login']);

Router::get('/login', [LoginController::class, 'view']);

Router::get('/dashboard', [DashboardController::class, 'view']);

Router::get('/busqueda', [SearchController::class, 'view']);

Router::get('/logout', [LoginController::class, 'logout']);

Router::dispatch();
?>
