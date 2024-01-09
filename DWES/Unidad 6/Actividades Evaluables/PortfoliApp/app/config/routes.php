<?php

use Alx\Portfoliapp\Entities\Router;
use Alx\Portfoliapp\Controllers\IndexController;
use Alx\Portfoliapp\Controllers\LoginController;
use Alx\Portfoliapp\Controllers\RegisterController;
use Alx\Portfoliapp\Controllers\SearchController;
use Alx\Portfoliapp\Controllers\DashboardController;
use Alx\Portfoliapp\Controllers\ProfileController;

// Landing

Router::get('/', [IndexController::class, 'view']);

Router::get('/busqueda', [SearchController::class, 'view']);


// Registro

Router::get('/registro/validar/:slug', function ($token){
    $RegisterController = new RegisterController();
    return $RegisterController->validateView($token);
});

Router::get('/registro', [RegisterController::class, 'view']);

Router::post('/registro', [RegisterController::class, 'form']);

// Login

Router::post('/login', [LoginController::class, 'login']);

Router::get('/login', [LoginController::class, 'view']);

Router::get('/dashboard', [DashboardController::class, 'view']);

Router::get('/logout', [LoginController::class, 'logout']);


// Perfil

Router::get('/profile/add/job', [ProfileController::class, 'addJobView']);

Router::post('/profile/add/job', [ProfileController::class, 'addJobProcess']);

Router::get('/profile/add/project', [ProfileController::class, 'addProjectView']);

Router::post('/profile/add/project', [ProfileController::class, 'addProjectProcess']);

Router::get('/profile/add/socialNetwork', [ProfileController::class, 'addSocialNetworkView']);

Router::post('/profile/add/socialNetwork', [ProfileController::class, 'addSocialNetworkProcess']);

Router::get('/profile/add/skill', [ProfileController::class, 'addSkillView']);

Router::post('/profile/add/skill', [ProfileController::class, 'addSkillProcess']);

Router::get('/profile/add/skillCategory', [ProfileController::class, 'addSkillCategoryView']);

Router::post('/profile/add/skillCategory', [ProfileController::class, 'addSkillCategoryProcess']);



Router::dispatch();
?>
