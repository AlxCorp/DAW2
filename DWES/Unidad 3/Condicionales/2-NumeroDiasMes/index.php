<?php
// Introducimos mes y año y mostramos número días mes

$month = 2;
$year = 2023;
$bisiesto = false;
$numDias = 31;

if (($year % 4) == 0 && ($year % 100) != 0 || ($year % 400) == 0) {
    $bisiesto = true;
}

switch ($month) {
    case 4:
    case 6:
    case 9:
    case 11:
        $numDias = 30;
        break;
    case 2:
        if ($bisiesto) {
            $numDias = 29;
            break;
        }
        $numDias = 28;
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
    <h1>El mes <?php echo($month) ?> 
    del año <?php echo($year) ?> 
    tiene <?php echo($numDias) ?> días 
    porque <?php echo($bisiesto ? ("es bisiesto") : ("NO es bisiesto")) ?></h1>
    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Condicionales/2-NumeroDiasMes"
        class="boton">GitHub</a>
</body>
</html>
