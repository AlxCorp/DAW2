<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="/src/css/main.css">
    <link rel="stylesheet" href="/src/css/allContacts.css">
</head>
<body>
    <?php require('../app/views/header.php') ?>
    <?php 
        if (is_null($contacto)) {
            echo('<p>No existe el contacto</p>');
        } else {
    ?>
        <p class="contactoCabecera">
            <span class="id">ID</span>
            <span class="nombre">Nombre</span>
            <span class="telefono">Teléfono</span>
            <span class="email">Email</span>
            <span></span>
            <span></span>
            <span></span>
        </p>
        <hr>
        <p class="contacto">
            <span class="id"><?= $contacto['id'] ?></span>
            <span class="nombre"><?= $contacto['nombre'] ?></span>
            <span class="telefono"><?= $contacto['telefono'] ?></span>
            <span class="email"><?= $contacto['email'] ?></span>
            <a href="/edit/<?= $contacto['id'] ?>">EDITAR</a>
            <a href="/del/<?= $contacto['id'] ?>">ELIMINAR</a>
        </p>        
    <?php } ?>
</body>
</html>