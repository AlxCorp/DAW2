<?php 
/**
 * Crea un script que utilice una función anónima para generar los nombres de usuarios. El
 * nombre de usuario se foma concatenando las dos primeras letras del primer apellido, las dos
 * primeras letras del segundo apellido y la inicial del nombre.
 * @author Alejandro Priego
 * @date 17-11-23
 */

$aUsuarios = [
    ['nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'],
    ['nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'],
    ['nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''],
];

$anonF = function($user) {
    $a1 = $user["apellido1"][0].$user["apellido1"][1];
    $a2 = "";
    $n1 = $user["nombre"][0];

    if ($user["apellido2"] != "") {
        $a2 = $user["apellido2"][0].$user["apellido2"][1];
    }
    
    return ($a1.$a2.$n1."<br>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        foreach ($aUsuarios as $usuario) {
            echo($anonF($usuario));
        }
    ?>
</body>
</html>