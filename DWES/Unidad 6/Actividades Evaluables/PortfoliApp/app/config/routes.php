<?php

use Alx\Portfoliapp\Entities\Router;

Router::get('/', function() {
	include "../app/views/index_view.php";
});

Router::get('/registro/validar', function() {
	include "../app/views/validate_view.php";
});

Router::get('/registro', function() {
	include "../app/views/register_view.php";
});

Router::get('/login', function() {
	include "../app/views/login_view.php";
});

Router::get('/busqueda', function() {
	include "../app/views/search_view.php";
});

Router::dispatch();
?>
