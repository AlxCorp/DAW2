<?php

$a = 1;
$b = 8;
$c = 4;

$nums = [];

array_push($nums, $a, $b, $c);
sort($nums);

$a = $nums[0];
$b = $nums[1];
$c = $nums[2];

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
    <h1>
        <?php echo ($a) ?>
    </h1>
    <h1>
        <?php echo ($b) ?>
    </h1>
    <h1>
        <?php echo ($c) ?>
    </h1>
    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Condicionales/1-OrdenarNumeros"
        class="boton">GitHub</a>
</body>

</html>