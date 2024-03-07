<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega una skill</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/formPage.css">
</head>
<body>
    <?php 
        if (isset($alertColor)) {
            echo('<div class="header-alert '.$alertColor.'-header-alert">');
                echo('<p>'.$message.'</p>');
            echo('</div>');
        }
    ?>
    <?php include_once('header.php') ?>
    <h1>Agrega una nueva skill</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Nombre de la skill" required>
            <select name="skill_category" required>
            <?php 
                foreach ($skillCategories as $category) {
                    echo('<option value="'.$category['id'].'">'.$category['category'].'</option>');
                }
            ?>
            </select>
            <select name="visible" required>
                <option value="1" selected>Visible</option>
                <option value="0">Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
        <a href="/profile/add/skillCategory"><button class="addSkillCategoryBtt">Crear Categoría de skill</button></a>
    </main>
</body>
</html>