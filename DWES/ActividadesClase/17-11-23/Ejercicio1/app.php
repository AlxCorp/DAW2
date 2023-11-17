<?php 
/**
 * Escribe un script en php para calcular la letra del NIF a partir del número del DNI enviado
 * en la URL: http://dominio.local/calculaletra?dni=30182410.
 * @author Alejandro Priego
 * @date 17-11-23
 */

if (!$_GET["dni"]) {
    header("Location: index.html");
}

define("ALETRAS", ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"]);
define("DNI", $_GET["dni"]);

function getLetra($dniNumber) {
    return(ALETRAS[$dniNumber % 23]);
}

$dniLetter = getLetra(DNI);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculo Letra DNI</title>
</head>
<body>
    <h1>La letra de tu DNI es: <?php echo($dniLetter) ?></h1>
    <h1>Tu DNI con letra es: <?php echo(DNI.$dniLetter) ?></h1>
</body>
</html>