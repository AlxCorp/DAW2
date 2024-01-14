<?php
include("../vendor/autoload.php");
use Alx\Contactos\Models\Contactos;
$c1 = new Contactos();

$c1->set(array(
    'nombre' => 'Juan',
    'telefono' => '123456789',
    'email' => 'mm@gmail.com')
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
</head>
<body>
    <h1>Hola Mundo - DWES</h1>
</body>
</html>
