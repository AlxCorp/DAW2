<?php

$datos = [
    "nombre",
    "apellidos",
    "foto",
    "categoriaProfesional",
    "email",
    "phone",
    [
        "linkedin",
        "twitter",
    ],
    "resumen",
]

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="formprocesar.php">
        <?php
        foreach ($datos as $dato) {
            if (is_array($dato)) {
                foreach ($dato as $rss) {
                    echo ('<input type="text" placeholder="' . $rss . '" name="' . $rss . '"/>');
                }
            } else {
                echo ('<input type="text" placeholder="' . $dato . '" name="' . $dato . '"/>');
            }
            echo ("<br>");
        }
        ?>
    </form>
</body>

</html>