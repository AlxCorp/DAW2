<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1><?php echo(count($data["numeros"])) ?> Números Pares</h1>
    <p>
        <?php 
            echo $data["message"];
            echo("<br>");
            foreach($data["numeros"] as $numero) {
                echo $numero;
                echo ("<br>");

            }
        ?>
    </p>
</body>
</html>