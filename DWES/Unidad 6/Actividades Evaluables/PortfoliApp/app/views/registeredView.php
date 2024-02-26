<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Correcto</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/registerSuscess.css">
</head>
<body>
    <?php include_once('header.php') ?>
    <main>
        <h1>Te has registrado correctamente</h1>
        <h2>Bienvenido, <?= $name.' '.$surname ?></h2>
        <h3>Por favor, revisa tu bandeja de entrada para el email <span><?= $email ?></span></h3>
    </main>
</body>
</html>