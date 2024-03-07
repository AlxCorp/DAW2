<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega una nueva categoría de skill</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/formPage.css">
</head>
<body>
    <?php 
    if ($alertColor) {
        echo('<div class="header-alert '.$alertColor.'-header-alert">');
            echo('<p>'.$message.'</p>');
        echo('</div>');
    }
    ?>
    <?php include_once('header.php') ?>
    <h1>Agrega una nueva categoría de skill</h1>
    <main>
        <form action="/profile/add/skillCategory" method="POST">
            <input type="text" name="category" placeholder="Nombre de la categoría" required>
            <input type="submit" value="Crear categoría">
        </form>
    </main>
</body>
</html>