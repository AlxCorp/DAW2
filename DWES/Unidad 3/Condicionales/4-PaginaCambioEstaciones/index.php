<?php 

$ESTACION_ACTUAL = "invierno";
$HORA_ACTUAL = 13;

$estaciones = [
    "primavera" => "./img/primavera.jpg",
    "verano" => "./img/verano.png",
    "otoño" => "./img/otono.jpg",
    "invierno" => "./img/invierno.webp",
];
$horas = [
    1 => "#",
    2 => "#FF0000",
    3 => "#00FF00",
    4 => "#0000FF",
    5 => "#FFFF00",
    6 => "#FF00FF",
    7 => "#00FFFF",
    8 => "#FFFFFF",
    9 => "#000000",
    10 => "#FFA500",
    11 => "#800080",
    12 => "#008000",
    13 => "#800000",
    14 => "#008080",
    15 => "#000080",
    16 => "#FFFF99",
    17 => "#FFCC00",
    18 => "#FF66CC",
    19 => "#993399",
    20 => "#663300",
    21 => "#CCCCCC",
    22 => "#666666",
    23 => "#990000",
    24 => "#009900",
    25 => "#000099",
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
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
<body style="background-color: <?php echo($horas[$HORA_ACTUAL]) ?>">
    <div style="max-height: 200px; text-align: center">
        <img src="<?php echo($estaciones[$ESTACION_ACTUAL]) ?>" height="200px">
    </div>
    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Condicionales/4-PaginaCambioEstaciones" class="boton">Github</a>
</body>
</html>