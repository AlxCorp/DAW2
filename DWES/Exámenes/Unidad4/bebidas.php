<?php 
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>faMia Pizzería</title>
    <?php include("./Templates/boostrap.php") ?>
</head>
<body>
    <?php include("./Templates/header.php") ?>
    <h2>Bebidas</h2>
    <h3>Selecciona los productos.</h3>
    <div class="card-deck">
    <?php 
        foreach($productos['bebidas'] as $bebidaId => $bebida) {
            echo('<div class="card">');
            echo('<img class="imagen-bebida card-img-top" src="./img/Bebidas/'.$bebida['imagen'].'" alt="'.$bebida['nombre'].'">');
            echo('<div class="card-body">');
            echo('<h5 class="card-title">'.$bebida['nombre'].'</h5>');
            echo('<form action="carrito.php" method="post">');
            echo('<label for="cantidad">Cantidad: </label>');
            echo('<input type="number" name="cantidad" id="cantidad" min="1" value="1">');
            echo('<br><input type="submit" value="COMPRAR">');
            echo('<input type="hidden" name="tipo-producto" value="bebidas">');
            echo('<input type="hidden" name="producto" value="'.$bebidaId.'">');
            echo('</form>');
            echo('</div></div>');
        }
    ?>
    </div>
</body>
</html>
