<?php
if (!$_POST) {
    header("Location: index.php");
};

include("./config/config.php");

$allVerbs = unserialize($_POST['allVerbs']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Corrección Verbos
    </title>
    <link rel="stylesheet" href="appstyle.css">
</head>

<body>
    <table>
        <tr>
            <th>Infinitivo</th>
            <th>Pasado Simple</th>
            <th>Pasado Participio</th>
            <th>Traducción</th>
        </tr>
        <?php 
            foreach ($allVerbs as $verb) {
                echo("<tr>");
                foreach ($verb as $verbTime) {
                    if ($verbTime[1] == "t") {
                        echo ($verbTime);
                    } else {
                        echo ("<td>".$verbTime."</td>");
                    }
                }
                echo("</tr>");
            }

  
        ?>
    </table>
</body>
</html>