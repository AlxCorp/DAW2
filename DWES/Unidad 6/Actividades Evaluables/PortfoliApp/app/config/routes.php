<?php

use Alx\Portfoliapp\Entities\Router;
use Alx\Portfoliapp\Controllers\IndexController;
use Alx\Portfoliapp\Controllers\LoginController;
use Alx\Portfoliapp\Controllers\RegisterController;
use Alx\Portfoliapp\Controllers\SearchController;

Router::get('/', [IndexController::class, 'view']);

Router::get('/registro/validar/:slug', function ($token){
    $RegisterController = new RegisterController();
    $RegisterController->validateView($token);
});

Router::get('/registro', [RegisterController::class, 'view']);

Router::post('/registro', [RegisterController::class, 'form']);

Router::get('/login', [LoginController::class, 'view']);

Router::get('/busqueda', [SearchController::class, 'view']);

Router::dispatch();
?>
