<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita una red social</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/formPage.css">
</head>
<body>
    <?php include_once('header.php') ?>
    <h1>Agrega una nueva red social</h1>
    <main>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Nombre de la red social" required value="<?= $socialNetworkName ?>">
            <input type="url" name="url" placeholder="URL de la red social" required value="<?= $socialNetworkUrl ?>">
            <select name="visible" required>
                <option value="1" <?= $socialNetworkVisible == 1 ? "selected" : "" ?>>Visible</option>
                <option value="0" <?= $socialNetworkVisible == 0 ? "selected" : "" ?>>Oculto</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>