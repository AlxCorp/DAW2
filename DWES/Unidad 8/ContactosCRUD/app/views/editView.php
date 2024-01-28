<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="/src/css/main.css">
    <link rel="stylesheet" href="/src/css/index.css">
</head>
<body>
    <?php require('../app/views/header.php') ?>
    <h1>Editar contacto</h1>
    <form action="/update" method="post">
        <div>
            <label for="name">Nombre: </label>
            <input type="text" id="name" name="name" value="<?= $contacto['nombre'] ?>">
        </div>
        <div>
            <label for="tel">Teléfono: </label>
            <input type="number" id="tel" name="tel" min="100000000" max="9999999999" value="<?= $contacto['telefono'] ?>">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" value="<?= $contacto['email'] ?>">
        </div>
        <input type="hidden" name="id" value="<?= $contacto['id'] ?>">
        <button type="submit">Editar</button>
    </form>
</body>
</html>