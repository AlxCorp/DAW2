<?php
/**
@author Alejandro Priego
@date 29/09/2023
@enunciado Escribir los números 1 al 10
*/

for ($n = 0; $n < 10; $n++) {
    echo ("<h1>" . ($n + 1) . "</h1>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
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
    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Bucles/1-Numeros1a10"
        class="boton">GitHub</a>
</body>
</html>