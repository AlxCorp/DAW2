<?php
/**
 * @author Alejandro Priego Izquierdo
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el
 *   calendario mensual correspondiente. Marcar el día actual en verde y los festivos
 *   en rojo.
 */
$MONTH = "14141";
$YEAR = 2023;
$FESTIVOS = [];

$monthDays = [
    ["Enero", 31],
    ["Febrero", 28],
    ["Marzo", 31],
    ["Abril", 30],
    ["Mayo", 31],
    ["Junio", 30],
    ["Julio", 31],
    ["Agosto", 31],
    ["Septiembre", 30],
    ["Octubre", 31],
    ["Noviembre", 30],
    ["Diciembre", 31],
];

function comprobarBisiesto($year): bool
{
    if (($year % 4) == 0 && ($year % 100) != 0) {
        if ($year % 400 == 0) {
            return true;
        }
    }
    return false;
}
;

if ($MONTH == "Febrero") {
    if (comprobarBisiesto($YEAR)) {
        $numDays = $monthDays["Febrero"] + 1;
    }
} else {
    $numDays = $monthDays[$MONTH];
}

$firstDay = date('w', mktime(0, 0, 0, $MONTH, 1, $YEAR));




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
</head>

<body>
    <h2>Calendario de <?php echo($MONTH." ". $YEAR) ?></h2>
    <table border='1'>
        <tr>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mié</th>
            <th>Jue</th>
            <th>Vie</th>
            <th>Sáb</th>
            <th>Dom</th>
        </tr>
        <tr>
        <?php 
        for ($i = 0; $i < $firstDay; $i++) {
            echo "<td></td>";
        }

        echo($firstDay)
        ?>
    </tr>
</table>
</body>

</html>