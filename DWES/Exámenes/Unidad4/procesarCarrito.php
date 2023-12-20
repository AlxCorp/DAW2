<?php 
require("./config.php");
session_start();
$carrito = $_SESSION['carrito'];

// TICKET

$ticket = fopen("./Ficheros/Tickets/ticket_".time(), "w") or exit("No puede crearse el fichero!");
fwrite($ticket, "TICKET PIZZERIA faMia\n--------------------------------------------------------\n");
fwrite($ticket, "#\tDescripción\t\tCantidad\tImporte/Ud\tTotal\n");  

$productosNobre = "";

$pizzas = [];
$total = 0;
    foreach($carrito as $id => $producto) {

        $productosNobre = $productosNobre.$producto[0]."-".$producto[1].",";

        $descripcion = $productos[$producto[0]][$producto[1]]['nombre'].' '.$producto[3];
        $cantidad = $producto[2];
        
        if ($producto[3] == "") {
            $precio = $productos[$producto[0]][$producto[1]]['precio'];
        } else {
            $precio = $productos[$producto[0]][$producto[1]]['precio'][$producto[3]];
        }
        
        $totalProducto = $producto[2] * $precio;

        $total += $producto[2] * $precio;
        $linea = ($id+1)."\t".$descripcion."\t".$cantidad."\t\t".$precio."\t".$totalProducto."€\n";
        fwrite($ticket, $linea);  

        if ($producto[0] == "pizzas") {
            array_push($pizzas, [$descripcion, $cantidad]);
        }
    }
    fwrite($ticket, "--------------------------------------------------------\n");
    fwrite($ticket, "\t\t\t\t".$total."€\n");  
fclose($ticket);

// COMANDA

if (isset($pizzas[0])) {
    $comanda = fopen("./Ficheros/Comandas/comanda_".time()."_pendiente", "w") or exit("No puede crearse el fichero!");
    foreach($pizzas as $numero => $pizza) {
        fwrite($comanda, $numero." | ".$pizza[0]." - ".$pizza[1]."\n");
    }
    fclose($comanda);
}

setcookie("featured", $productosNobre, time()+60*60*60);

include("logout.php");
?>