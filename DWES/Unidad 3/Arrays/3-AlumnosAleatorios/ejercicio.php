<?php 
$ALUMNOS = [
    "al1",
    "al2",
    "al3"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
    * {
        text-align: center;
    }
    h1 {
        font-size: 150px
    }
</style>
</head>
<body>
    <?php 
        echo("<h1>".$ALUMNOS[array_rand($ALUMNOS)]."</h1>");
    ?>
</body>
</html>