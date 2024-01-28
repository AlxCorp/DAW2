<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="/src/css/main.css">
</head>
<body>
    <?php require('../app/views/header.php') ?>
    <h1>Agrega un contacto</h1>
    <form action="/add" method="post">
        <div>
            <label for="name">Nombre: </label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="tel">Teléfono: </label>
            <input type="number" id="tel" name="tel" min="100000000" max="9999999999">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email">
        </div>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>