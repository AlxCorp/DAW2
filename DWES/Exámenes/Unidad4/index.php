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
    <h3>Selecciona los productos.</h3>
    <div class="card-deck">
    <?php 
        foreach($productos['pizzas'] as $pizzaId => $pizza) {
            echo('<div class="card">');
            echo('<img class="imagen-pizza card-img-top" src="./img/Pizzas/'.$pizza['imagen'].'" alt="'.$pizza['nombre'].'">');
            echo('<div class="card-body">');
            echo('<h5 class="card-title">'.$pizza['nombre'].'</h5>');
            echo('<p class="card-text">Individual: '.$pizza['precio']['individual'].'€<br>Media: '.$pizza['precio']['media'].'€<br>Familiar: '.$pizza['precio']['familiar'].'€</p>');
            echo('<form action="carrito.php" method="post">');
            echo('<label for="">Tamaño: </label>');
            echo('<select name="tamano" id="">');
            foreach($pizza['precio'] as $tamano => $precio) {
                echo('<option value="'.$tamano.'" >'.$tamano.'</option>');
            }
            echo('</select><br>');
            echo('<label for="cantidad">Cantidad: </label>');
            echo('<input type="number" name="cantidad" id="cantidad" min="1" value="1">');
            echo('<br><input type="submit" value="COMPRAR">');
            echo('<input type="hidden" name="tipo-producto" value="pizzas">');
            echo('<input type="hidden" name="producto" value="'.$pizzaId.'">');
            echo('</form>');
            echo('</div></div>');
        }
    ?>
    </div>
    <?php include("./Templates/footer.php") ?>
</body>
</html>
