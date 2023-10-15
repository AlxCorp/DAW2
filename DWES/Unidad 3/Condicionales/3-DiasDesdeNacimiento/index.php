<?php
//https://www.anerbarrena.com/php-date-1018/

$day = date("j"); // Día del mes, sin ceros iniciales, de 1 a 31
$month = date("n"); // Mes actual en digitos sin 0 inicial, de 1 a 12
$year = date("Y"); // Año actual con 4 dígitos, ej 2013

$birthDay = 29;
$birthMonth = 8;
$birthYear = 2003;

$days = 0;
$months = $month - $birthMonth;
$years = $year - $birthYear;

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
    <h1>DÍAS: <?php echo($days) ?></h1>
    <h1>MESES: <?php echo($months) ?></h1>
    <h1>AÑOS: <?php echo($years) ?></h1>
    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Condicionales/3-DiasDesdeNacimiento"
        class="boton">GitHub</a>
</body>
</html>


