<?php

$aPaises = array(
    array("id" => "es", "pais" => "España", "capital" => "Madrid"),
    array("id" => "it", "pais" => "Italia", "capital" => "Roma"),
    array("id" => "fr", "pais" => "Francia", "capital" => "Paris")
);

foreach ($aPaises as $pais)
    echo("Pais: ". $pais["pais"]. "<br>");
?>

<br>
<br>
<br>
<br>

<?php

$nombresPaises = [];
foreach ($aPaises as $pais)
    $nombresPaises[] = $pais["pais"];

print_r($nombresPaises)
?>

<br>
<br>
<br>
<br>

<?php

$nombresPaises = array_map(function ($pais) {
    return $pais["pais"];   
}, $aPaises);

print_r($nombresPaises)
?>
