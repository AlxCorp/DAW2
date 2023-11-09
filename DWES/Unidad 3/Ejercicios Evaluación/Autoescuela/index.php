<?php 
require_once("config/tests_cnf.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoTests</title>
    <link rel="stylesheet" href="indexStyle.css">
</head>
<body>
    <h1>Bienvenido a <span>AutoTests</span></h1>
    <?php 
        foreach ($aTests as $test) {

        echo('<a href="test.php?test='.$test["idTest"].'">');
        echo('<div class="card">');
        echo('<img src="img/cardIMG.png">');
        echo('<h2 class="testNumber">Test número '.$test["idTest"].'</h2>');
        echo('<span class="typePermiso">'.$test["Permiso"].'</span>');
        echo('<span class="category">'.$test["Categoria"].'</span>');
        echo('</div>');
        echo('</a>');

        }
    ?>
</body>
</html>