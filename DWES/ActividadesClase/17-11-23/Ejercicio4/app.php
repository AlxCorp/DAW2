<?php 
/**
 * Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 * @author Alejandro Priego
 * @date 17-11-23
 */

if (!$_GET["number"]) {
    header("Location: index.html");
}
define("NUMBER", $_GET["number"]);

function sumaRecursiva($num) {
    $total = 0;
    for ($n = 0; $n < strlen($num); $n++) {
        $total += $num[$n];
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Suma Recursiva</title>
</head>
<body>
    <h1>
    <?php 
       echo(sumaRecursiva(NUMBER));
    ?>
    </h1>
</body>
</html>