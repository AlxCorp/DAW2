<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/src/css/main.css">
    <link rel="stylesheet" href="/src/css/login.css">
</head>
<body>
    <?php require('../app/views/header.php') ?>
    <?php 
        if (isset($error)) {
            echo('<p class="error">'.$error.'</p>');
        }
    ?>
    <h1>Login</h1>
    <form action="/login" method="post">
        <div>
            <label for="usuario">Usuario: </label>
            <input type="text" id="usuario" name="usuario">
        </div>
        <div>
            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>