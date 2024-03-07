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
    <h1>Edita el trabajo</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="title" placeholder="Título del trabajo" required value="<?= $jobTitle ?>">
            <textarea placeholder="Descripción del trabajo" name="summary" required><?= $jobDescription ?></textarea>
            <input type="date" placeholder="Fecha de Inicio" name="start_date" required value="<?= $jobStartDate ?>">
            <input type="date" placeholder="Fecha de Fin" name="finish_date" value="<?= $jobStartDate ?>">
            <textarea placeholder="Logros (Separados por comas)" name="achievements"><?= $jobAchievements ?></textarea>
            <select name="visible" required>
                <option value="1" <?= $jobVisible == 1 ? "selected" : "" ?>>Visible</option>
                <option value="0" <?= $jobVisible == 0 ? "selected" : "" ?>>Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>