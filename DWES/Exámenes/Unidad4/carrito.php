<?php 
session_start();
require_once("./config.php");
require_once("./lib/carritoFunc.php");

if (!isset($_POST['producto'])) {
    if (!isset($_COOKIE['he_comprado'])) {
        header('Location:' . getenv('HTTP_REFERER'));
    }
    $allCartProducts = verProductos();
} else {
    primeraCompra();
    $tipoProducto = $_POST['tipo-producto'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $tamano = $tipoProducto == "pizzas" ? $_POST['tamano'] : "";

    agregarProducto($tipoProducto, $producto, $cantidad, $tamano);
    header('Location:' . getenv('HTTP_REFERER'));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <?php include("./Templates/boostrap.php") ?>
</head>
<body>
<?php include("./Templates/header.php") ?>

<table class="cart table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Importe/Ud</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $total = 0;
        foreach($allCartProducts as $productoNumber => $productoCarrito) {
            echo('<tr>');
            echo('<th scope="row">'.($productoNumber+1).'</th>');
            echo('<td>'.$productos[$productoCarrito[0]][$productoCarrito[1]]['nombre'].' '.$productoCarrito[3].'</td>');
            echo('<td>'.$productoCarrito[2].'</td>');
            if ($productoCarrito[3] == "") {
                $precio = $productos[$productoCarrito[0]][$productoCarrito[1]]['precio'];
                echo('<td>'.$precio.'€</td>');
            } else {
                $precio = $productos[$productoCarrito[0]][$productoCarrito[1]]['precio'][$productoCarrito[3]];
                echo('<td>'.$precio.'€</td>');
            }
            echo('<td>'.$productoCarrito[2] * $precio.'€</td>');
            echo('</tr>');
            $total += $productoCarrito[2] * $precio;
        }
    ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <th scope="row"><?php echo($total) ?>€</th>
    </tr>
  </tbody>
</table>
<form action="./procesarCarrito.php" method="post">
    <input type="submit" value="COMANDAR" class="btn btn-primary btn-lg btn-block"/>
</form>

</body>
</html>