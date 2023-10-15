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
    <style>
        .boton {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3498db;
            /* Color de fondo */
            color: #ffffff;
            /* Color del texto */
            font-size: 24px;
            border: none;
            border-radius: 4px;
            /* Bordes redondeados */
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .boton:hover {
            background-color: #2980b9;
        }
    </style>

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

    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Condicionales/5-ListaEnlacesUsuarios" class="boton">GitHub</a>
</body>

</html>