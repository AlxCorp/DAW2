<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Contactos</title>
    <link rel="stylesheet" href="/src/css/main.css">
    <link rel="stylesheet" href="/src/css/allContacts.css">
</head>
<body>
    <?php require('../app/views/header.php') ?>
    <h1>Listado de Contactos</h1>
    <form action="/get" method="post">
        <p>Buscar contacto por ID: </p>
        <input type="number" name="contactId" required>
        <button type="submit">Buscar</button>
    </form>
        <p class="contactoCabecera">
            <span class="id">ID</span>
            <span class="nombre">Nombre</span>
            <span class="telefono">Teléfono</span>
            <span class="email">Email</span>
            <span></span>
            <span></span>
            <span></span>
        </p>
    <?php 
        foreach($contactos as $contacto) {
    ?>
        <hr>
        <p class="contacto">
            <span class="id"><?= $contacto['id'] ?></span>
            <span class="nombre"><?= $contacto['nombre'] ?></span>
            <span class="telefono"><?= $contacto['telefono'] ?></span>
            <span class="email"><?= $contacto['email'] ?></span>
            <a href="/edit/<?= $contacto['id'] ?>">EDITAR</a>
            <a href="/del/<?= $contacto['id'] ?>">ELIMINAR</a>
        </p>        
        <?php 
        }
        if (count($contactos) == 0) {
            echo('<p>No hay contactos en la agenda</p>');
        }
        ?>
</body>
</html>