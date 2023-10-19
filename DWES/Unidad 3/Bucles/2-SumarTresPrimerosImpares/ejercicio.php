<?php
/**
@author: Alejandro Priego
@date: 29/09/2023
@enunciado: Sumar los tres primeros números pares
*/

$suma = 0;
$contador = 0;

for ($num = 1; $contador < 3; $num++) {
    if ($num % 2 != 0) {
        $suma += $num;
        $contador += 1;
    }
}

echo($suma);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
</body>
</html>