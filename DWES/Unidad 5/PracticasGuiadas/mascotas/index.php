<?php 
require_once "vendor/autoload.php";

use App\Models\Perro;
use App\Models\Persona;
// Puede usarse desde 7.0 "use App\Models\{Perro, Persona}"

$perro = new Perro("Tana", "Negro");
echo($perro->darPata());
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
echo($perro->darPata());


?>