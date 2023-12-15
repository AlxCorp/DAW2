<?php 
session_start();
if (isset($_SESSION['contactos'])) {
    $hayContactos = true;
} else {
    $hayContactos = false;
    $_SESSION['contactos'] = [];
}

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    array_push($_SESSION['contactos'], [$nombre, $telefono]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
</head>
<body>
    <div class="Nuevo Contacto"></div>
    <h2>Crea un nuevo contacto</h2>
    <form action="" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono">
        <br>
        <input type="submit" value="GUARDAR">
    </form>
    <?php 
    if ($hayContactos) {
        echo("<ul>");
        foreach($_SESSION['contactos'] as $contacto) {
            echo('<li>'.$contacto[0].' - '.$contacto[1].'</li>');
        }
        echo("</ul>");
    }
    ?>
</body>
</html>