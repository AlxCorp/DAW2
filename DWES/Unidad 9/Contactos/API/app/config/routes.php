<?php

use Alx\ContactosCrud\Entities\Router;
use Alx\ContactosCrud\Controllers\LoginController;
use Alx\ContactosCrud\Controllers\CRUDController;

// User

Router::get('/login', [LoginController::class, 'login']);

Router::post('/login', [LoginController::class, 'loginProcess']);

Router::get('/logout', [LoginController::class, 'logout']);

// CRUD 

Router::get('/get', [CRUDController::class, 'getAll']);

Router::get('/get/:slug', function ($contactoId){
    $CRUDController = new CRUDController();
    return $CRUDController->get($contactoId);
});

Router::post('/add', [CRUDController::class, 'add']);

Router::put('/update', [CRUDController::class, 'update']);

Router::delete('/delete', [CRUDController::class, 'delete']);


Router::dispatch();
?>
