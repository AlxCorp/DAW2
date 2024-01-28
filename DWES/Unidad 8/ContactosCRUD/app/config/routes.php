<?php

use Alx\ContactosCrud\Entities\Router;
use Alx\ContactosCrud\Controllers\IndexController;
use Alx\ContactosCrud\Controllers\LoginController;
use Alx\ContactosCrud\Controllers\CRUDController;

// Landing

Router::get('/', [IndexController::class, 'view']);

// User

Router::get('/login', [LoginController::class, 'login']);

Router::post('/login', [LoginController::class, 'loginProcess']);

Router::get('/logout', [LoginController::class, 'logout']);

// CRUD View

Router::get('/get', [CRUDController::class, 'getAllView']);

Router::get('/get/:slug', function ($contactoId){
    $CRUDController = new CRUDController();
    return $CRUDController->getView($contactoId);
});

Router::get('/add', [CRUDController::class, 'addView']);

Router::get('/edit/:slug', function ($contactoId){
    $CRUDController = new CRUDController();
    return $CRUDController->editView($contactoId);
});

Router::get('/del/:slug', function ($contactoId){
    $CRUDController = new CRUDController();
    return $CRUDController->delete($contactoId);
});

// CRUD Function

Router::post('/get', function (){
    $CRUDController = new CRUDController();
    return $CRUDController->getView($_POST['contactId']);
});

Router::post('/add', [CRUDController::class, 'add']);

Router::post('/update', [CRUDController::class, 'update']);

Router::post('/delete', [CRUDController::class, 'delete']);


Router::dispatch();
?>
