<?php
$primeros = [
    [
        "nombre" => "Ensalada César",
        "precio" => 8.99,
        "imagen" => "ensalada_cesar.jpg",
    ],
    [
        "nombre" => "Sopa de Tomate",
        "precio" => 6.99,
        "imagen" => "sopa_tomate.jpg",
    ],
    [
        "nombre" => "Carpaccio de Salmón",
        "precio" => 11.99,
        "imagen" => "carpaccio_salmon.jpg",
    ],
];

$segundos = [
    [
        "nombre" => "Lasaña",
        "precio" => 12.99,
        "imagen" => "lasana.jpg",
    ],
    [
        "nombre" => "Filete de Ternera",
        "precio" => 16.99,
        "imagen" => "filete_ternera.jpg",
    ],
    // Agrega más platos de segundos
];

$postres = [
    [
        "nombre" => "Tarta de Chocolate",
        "precio" => 7.99,
        "imagen" => "tarta_chocolate.jpeg",
    ],
    [
        "nombre" => "Helado de Vainilla",
        "precio" => 4.99,
        "imagen" => "helado_vainilla.jpg",
    ],
];

function calcularPrecioMenu($platos) {
    $precioTotal = 0;
    foreach ($platos as $plato) {
        $precioTotal += $plato["precio"];
    }
    $descuento = $precioTotal * 0.20;
    $precioConDescuento = $precioTotal - $descuento;
    return number_format($precioConDescuento, 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menú del Restaurante</title>
</head>
<body>
    <h2>Menús Disponibles</h2>
    
    <h3>Menú 1 - Primeros</h3>
    <ul>
        <?php foreach ($primeros as $plato) : ?>
            <li>
                <img src="<?php echo $plato['imagen']; ?>" alt="<?php echo $plato['nombre']; ?>" height="100">
                <?php echo $plato['nombre']; ?> - $<?php echo $plato['precio']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <h3>Menú 2 - Segundos</h3>
    <ul>
        <?php foreach ($segundos as $plato) : ?>
            <li>
                <img src="<?php echo $plato['imagen']; ?>" alt="<?php echo $plato['nombre']; ?>" height="100">
                <?php echo $plato['nombre']; ?> - $<?php echo $plato['precio']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <h3>Menú 3 - Postres</h3>
    <ul>
        <?php foreach ($postres as $plato) : ?>
            <li>
                <img src="<?php echo $plato['imagen']; ?>" alt="<?php echo $plato['nombre']; ?>" height="100">
                <?php echo $plato['nombre']; ?> - $<?php echo $plato['precio']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Precio del Menú con Descuento</h2>
    <?php
    $menuCompleto = array_merge($primeros, $segundos, $postres);
    $precioMenuConDescuento = calcularPrecioMenu($menuCompleto);
    echo "El precio del menú completo con descuento es: $" . $precioMenuConDescuento;
    ?>
</body>
</html>
