<?php
/**
 * @author Alejandro Priego Izquierdo
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el
 *   calendario mensual correspondiente. Marcar el día actual en verde y los festivos
 *   en rojo.
 */
$MONTH = "11";
$YEAR = 2023;
$FESTIVOS = [
    "1-1",
    // Año Nuevo
    "6-1",
    // Día de Reyes
    "19-3",
    // Día de San José
    "1-5",
    // Día del Trabajo
    "15-8",
    // Asunción de la Virgen
    "12-10",
    // Día de la Hispanidad
    "1-11",
    // Todos los Santos
    "6-12",
    // Día de la Constitución Española
    "8-12",
    // Inmaculada Concepción
    "25-12",
    // Navidad
    "1-5",
    // Día del Trabajo en Córdoba
    "24-6",
    // San Juan en Córdoba
    "15-8",
    // Asunción de la Virgen en Córdoba
    "8-9",
    // Día de la Virgen de la Salud en Córdoba capital
];

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

if ($MONTH == "2") {
    if (comprobarBisiesto($YEAR)) {
        $numDays = $monthDays[1][1] + 1;
    }
} else {
    $numDays = $monthDays[$MONTH - 1][1];
}

$firstDay = date('w', mktime(0, 0, 0, $MONTH, 1, $YEAR));
if ($firstDay == 0) {
    $firstDay = 7; // Cambia el valor de 0 (domingo) a 7 para que el calendario comience en domingo
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
    <style>
        .current {
            background-color: greenyellow;
        }

        .holiday {
            background-color: red;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            height: 70vh;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        th:first-child {
            background-color: #555;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

</head>

<body>
    <h2>Calendario de
        <?php echo ($monthDays[$MONTH - 1][0] . " de " . $YEAR) ?>
    </h2>
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
            $currentDay = 1;
            for ($i = 0; $i < 6; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    if ($i === 0 && $j < $firstDay - 1) {
                        echo "<td></td>";
                    } elseif ($currentDay <= $numDays) {
                        $dayClass = "";
                        if ($currentDay == date("d") && $MONTH == date("m")) {
                            $dayClass = "current";
                        }
                        if (in_array($currentDay . "-" . $MONTH, $FESTIVOS)) {
                            $dayClass = "holiday";
                        }
                        echo "<td class='$dayClass'>$currentDay</td>";
                        $currentDay++;
                    }

                }
                echo "</tr><tr>";
            }

            ?>
        </tr>
    </table>
</body>

</html>