<?php 
if (isset($_COOKIE['featured'])) {
    $productosDestacados =  explode(",", $_COOKIE['featured']);
    $elementos = count($productosDestacados);

    if ($elementos > 3) {
            $productosDestacados = [$productosDestacados[0], $productosDestacados[1], $productosDestacados[2]];
        }
    
    echo('<h3>Comprados Recientemente</h3>');
    echo('<footer>');
    foreach($productosDestacados as $destacado) {
        $destacadoArr = explode("-", $destacado);
        $prod = $productos[$destacadoArr[0]][$destacadoArr[1]];

        echo('<div class="card" style="width: 18rem;">');
        echo('<img class="card-img-top" src="./img/'.ucfirst($destacadoArr[0]).'/'.$prod['imagen'].'" alt="Card image cap">');
        echo('<div class="card-body">');
        echo('<h5 class="card-title">'.$prod['nombre'].'</h5>');
        echo('</div></div>');
    }
    echo('</footer>');

}
?>