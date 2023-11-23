<?php 
require_once("../app/Config/config.php");

session_start();
if (isset($_SESSION["app_board"])) {
    header('Location: ./logout.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
    <link rel="stylesheet" href="indexStyle.css">
</head>
<body>
    <h1>Bienvenido al <span>BuscaMinas</span></h1>
    <form action="app.php" method="POST">
        <div>
            <label for="filas">Filas: </label>
            <input type="number" name="filas" max="100">
        </div>
        <div>
            <label for="columnas">Columnas: </label>
            <input type="number" name="columnas" max="100">
        </div>
        <div>
            <label for="bombas">Bombas: </label>
            <input type="number" name="bombas" max="9000">
        </div>
        <button type="submit">JUGAR!</button>
    </form>
</body>
</html>