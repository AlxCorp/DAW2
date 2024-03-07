<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega un trabajo</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/formPage.css">
</head>
<body>
    <?php 
    if ($alert) {
        $error ? 'red' : 'green';
        echo('<div class="header-alert '.$error.'-header-alert">');
            echo('<p>'.$message.'</p>');
        echo('</div>');
    }
    ?>
    <?php include_once('header.php') ?>
    <h1>Agrega un nuevo proyecto</h1>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="projectImg">Imagen del proyecto: </label>
                <input type="file" name="logo" id="projectImg">
            </div>
            <input type="text" name="title" placeholder="Título del proyecto" required>
            <textarea placeholder="Descripción del proyecto" name="description" required></textarea>
            <textarea placeholder="Tecnologías (Separadas por comas)" name="technologies"></textarea>
            <select name="visible" required>
                <option value="1" selected>Visible</option>
                <option value="0">Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>