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
    <?php include_once('header.php') ?>
    <h1>Agrega un nuevo proyecto</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="title" placeholder="Título del proyecto" required value="<?= $projectTitle ?>">
            <textarea placeholder="Descripción del proyecto" name="description" required><?= $projectDescription ?></textarea>
            <textarea placeholder="Tecnologías (Separadas por comas)" name="technologies"><?= $projectTechnologies ?></textarea>
            <select name="visible" required>
                <option value="1" <?= $projectVisible == 1 ? "selected" : "" ?>>Visible</option>
                <option value="0" <?= $projectVisible == 0 ? "selected" : "" ?>>Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>