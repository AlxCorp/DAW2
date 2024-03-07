<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita una skill</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/formPage.css">
</head>
<body>
    <?php include_once('header.php') ?>
    <h1>Edita una nueva skill</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Nombre de la skill" required value="<?= $skillName ?>">
            <select name="visible" required>
                <option value="1" <?= $skillVisible == 1 ? "selected" : "" ?>>Visible</option>
                <option value="0" <?= $skillVisible == 0 ? "selected" : "" ?>>Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
        <a href="/profile/add/skillCategory"><button class="addSkillCategoryBtt">Crear Categoría de skill</button></a>
    </main>
</body>
</html>