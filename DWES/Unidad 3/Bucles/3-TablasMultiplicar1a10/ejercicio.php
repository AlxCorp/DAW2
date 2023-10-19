<?php
/**
@author: Alejandro Priego
@date: 29/09/2023
@enunciado: Tablas de multiplicar del 1 al 10. Aplicar estilos en filas/columnas.
*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <table>
        <?php
        for ($x = 0; $x < 10; $x++) {
            echo ("<th>Tabla del " . $x + 1 . "</th>");
        }

        for ($x = 0; $x < 10; $x++) {
            echo ("<tr>");
            for ($y = 1; $y < 11; $y++) {
                echo ("<td>" . (($x + 1) * $y) . "</td>");
            }
            echo ("</tr>");
        } ?>

    </table>
</body>

</html>