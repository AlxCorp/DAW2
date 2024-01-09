<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Validación</title>
    <link rel="stylesheet" href="/css/validate.css">
</head>
<body>
    <div class="header-alert <?= $error == "ACTIVADA" ? 'yellow' : 'red' ?>-header-alert">
        <p>Tu perfil NO ha podido validarse!</p>
    </div>
    <p class="error-message">
    <?php 
        if ($error == "ACTIVADA") {
            echo ('Esta cuenta ya ha sido activada.');
        } else if ($error == "EXPIRADO") {
            echo ('Este enlace ha caducado.');
            echo ('<a href="/">Reenviar validación.</a>');
        } else if ($error == "NOEXISTE") {
            echo ('Este token no existe.');
        }
    ?>
    </p>
</body>
</html>