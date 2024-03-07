<?php
    $arrFiles = scandir('./');
    unset($arrFiles[0]);
    unset($arrFiles[1]);
    array_pop($arrFiles);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Priego - DWES</title>
</head>
<body>
    <?php 
        foreach($arrFiles as $dir) {
            echo('<a href="./'.$dir.'">');
            echo($dir);
            echo('</a><br>');
        }
    ?>
</body>
</html>