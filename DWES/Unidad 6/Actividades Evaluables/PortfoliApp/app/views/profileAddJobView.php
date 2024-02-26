<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega un trabajo</title>
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
    <h1>Agrega un nuevo trabajo</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="title" placeholder="Título del trabajo" required>
            <textarea placeholder="Descripción del trabajo" name="summary" required></textarea>
            <input type="date" placeholder="Fecha de Inicio" name="start_date" required>
            <input type="date" placeholder="Fecha de Fin" name="finish_date">
            <textarea placeholder="Logros (Separados por comas)" name="achievements"></textarea>
            <select name="visible" required>
                <option value="1" selected>Visible</option>
                <option value="0">Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>