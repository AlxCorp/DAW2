<?php

$SELECCIONADO = 0;

$usuarios = [
    "Administrador",
    "Usuario"
];

$enlaces_admin = [
    "./1.html",
    "./2.html",
    "./3.html",
    "./4.html",
    "./5.html",
    "./6.html",
];

$enlaces_user = [
    "./1.html",
    "./2.html",
    "./3.html",
];

$SELECCIONADO = $usuarios[$SELECCIONADO];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    if ($SELECCIONADO == "Administrador") {
        foreach ($enlaces_admin as $key => $enlace) {
            echo ('<a href="' . $enlace . '">Enlace ' . $key . "</a><br>");
        }
    } elseif ($SELECCIONADO == "Usuario") {
        foreach ($enlaces_user as $key => $enlace) {
            echo ('<a href="' . $enlace . '">Enlace ' . $key . "</a><br>");
        }
    }
    ?>
</body>

</html>