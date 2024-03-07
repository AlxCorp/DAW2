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

Router::post('/busqueda', [SearchController::class, 'searchForm']);



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

Router::get('/profile/visible/job/:slug', function ($jobId){
    $ProfileController = new ProfileController();
    return $ProfileController->visibleJob($jobId);
});

Router::get('/profile/edit/job/:slug', function ($jobId){
    $ProfileController = new ProfileController();
    return $ProfileController->editJob($jobId);
});

Router::post('/profile/edit/job/:slug', function ($jobId){
    $ProfileController = new ProfileController();
    return $ProfileController->editJobProcess($jobId);
});

Router::get('/profile/erase/job/:slug', function ($jobId){
    $ProfileController = new ProfileController();
    return $ProfileController->eraseJob($jobId);
});



Router::get('/profile/add/project', [ProfileController::class, 'addProjectView']);

Router::post('/profile/add/project', [ProfileController::class, 'addProjectProcess']);

Router::get('/profile/visible/project/:slug', function ($projectId){
    $ProfileController = new ProfileController();
    return $ProfileController->visibleProject($projectId);
});

Router::get('/profile/edit/project/:slug', function ($projectId){
    $ProfileController = new ProfileController();
    return $ProfileController->editProject($projectId);
});

Router::post('/profile/edit/project/:slug', function ($projectId){
    $ProfileController = new ProfileController();
    return $ProfileController->editProjectProcess($projectId);
});

Router::get('/profile/erase/project/:slug', function ($projectId){
    $ProfileController = new ProfileController();
    return $ProfileController->eraseProject($projectId);
});



Router::get('/profile/add/socialNetwork', [ProfileController::class, 'addSocialNetworkView']);

Router::post('/profile/add/socialNetwork', [ProfileController::class, 'addSocialNetworkProcess']);

Router::get('/profile/visible/socialNetwork/:slug', function ($socialNetworkId){
    $ProfileController = new ProfileController();
    return $ProfileController->visibleSocialNetwork($socialNetworkId);
});

Router::get('/profile/edit/socialNetwork/:slug', function ($socialNetworkId){
    $ProfileController = new ProfileController();
    return $ProfileController->editSocialNetwork($socialNetworkId);
});

Router::post('/profile/edit/socialNetwork/:slug', function ($socialNetworkId){
    $ProfileController = new ProfileController();
    return $ProfileController->editSocialNetworkProcess($socialNetworkId);
});

Router::get('/profile/erase/socialNetwork/:slug', function ($socialNetworkId){
    $ProfileController = new ProfileController();
    return $ProfileController->eraseSocialNetwork($socialNetworkId);
});



Router::get('/profile/add/skill', [ProfileController::class, 'addSkillView']);

Router::post('/profile/add/skill', [ProfileController::class, 'addSkillProcess']);

Router::get('/profile/visible/skill/:slug', function ($skillId){
    $ProfileController = new ProfileController();
    return $ProfileController->visibleSkill($skillId);
});

Router::get('/profile/edit/skill/:slug', function ($skillId){
    $ProfileController = new ProfileController();
    return $ProfileController->editSkill($skillId);
});

Router::post('/profile/edit/skill/:slug', function ($skillId){
    $ProfileController = new ProfileController();
    return $ProfileController->editSkillProcess($skillId);
});

Router::get('/profile/erase/skill/:slug', function ($skillId){
    $ProfileController = new ProfileController();
    return $ProfileController->eraseSkill($skillId);
});




Router::dispatch();
?>
