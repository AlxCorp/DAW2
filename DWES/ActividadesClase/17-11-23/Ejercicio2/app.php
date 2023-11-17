<?php 
/**
 * Escribe un script que permita factorizar un número pasado por la URL. Muestra el resultado
 * en dos columnas.
 * @author Alejandro Priego
 * @date 17-11-23
 */

if (!$_GET["number"]) {
    header("Location: index.html");
}

$number = $_GET["number"];
$divisor = 2;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factorización Número</title>
</head>
<body>
    <?php 
        while ($number > 1) {

            if (($number % $divisor) == 0) {
                echo($number." | ".$divisor."<br>");
                $number /= $divisor;
                $divisor = 2;
            } else {
                    $divisor++;
            }
        }
    ?>
</body>
</html>