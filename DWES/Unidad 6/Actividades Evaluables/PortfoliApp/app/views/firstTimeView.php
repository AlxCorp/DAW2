<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completa tu Perfil</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/validate.css">
    <!-- <link rel="stylesheet" href="/css/firstTime.css"> -->
</head>
<body>
    <?php include_once('header.php') ?>
    <div class="header-alert green-header-alert">
        <p>Tu perfil se ha validado correctamente!</p>
    </div>
    <h1>Por favor, <?= $name ?>, termina de configurar tu perfil para que sea visible.</h1>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="text" placeholder="Categoría Profesiona" name="categoria_prof" required>
            <textarea placeholder="Resumen Personal" name="summary" required></textarea>
            <input type="submit" value="Hacerme visible">
        </form>
    </main>
</body>
</html>