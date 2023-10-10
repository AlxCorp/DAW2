<?php

$DIFICULTAD = 6;
$aRandomNumbers = [];

function getRandomNumbers()
{
    global $aRandomNumbers;
    $tempRandArray = [rand(0, 10), rand(0, 10)];

    if (in_array($tempRandArray, $aRandomNumbers)) {
        getRandomNumbers();
    } else {
        array_push($aRandomNumbers, $tempRandArray);
        return $tempRandArray;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Juego Tabla Multiplicar</title>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$aRandomNumbers = $_POST["aRandomNumbers"];
        var_dump($_POST);
    } else {
        for ($x = 0; $x < $DIFICULTAD; $x++) {
            getRandomNumbers();
        }
    }
    ?>
</head>

<body>
    <form method="post" action="./">
        <table>
            <?php
            for ($x = 0; $x < 10; $x++) {
                echo ("<th>Tabla del " . $x + 1 . "</th>");
            }

            for ($x = 1; $x < 11; $x++) {
                echo ("<tr>");
                for ($y = 1; $y < 11; $y++) {
                    if (in_array([$x, $y], $aRandomNumbers)) {
                        echo ('<td><input type="number" name="n[' . $x . '][' . $y . ']"></td>');
                    } else {
                        echo ("<td>" . ($x * $y) . "</td>");
                    }
                }
                echo ("</tr>");
            } ?>
        </table>
        <input type="submit">
    </form>
</body>

</html>