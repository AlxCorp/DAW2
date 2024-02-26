<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega una red social</title>
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
    <h1>Agrega una nueva red social</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Nombre de la red social" required>
            <input type="url" name="url" placeholder="URL de la red social" required>
            <select name="visible" required>
                <option value="1" selected>Visible</option>
                <option value="0">Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>