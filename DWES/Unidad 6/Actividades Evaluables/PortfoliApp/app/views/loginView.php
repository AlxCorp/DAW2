<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
    <?php include_once('header.php') ?>
    <main>
        <h1>Login</h1>
        <form action="" method="POST">
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Contraseña" name="password" required>
            <a href="lost-password">¿Contraseña olvidada?</a><br><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </main>
</body>
</html>