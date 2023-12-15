<?php 
    require("usuarios.php");
    $database = "usuarios";
    $script = fopen("users.db", "w") or exit("No puede abrirse el fichero!");

    fwrite($script, "CREATE DATABASE ".$database."\n");
    foreach($usuarios as $usuario) {
        $usuarioFinal = $usuario[1][0].$usuario[1][1].$usuario[2][0].$usuario[2][1].$usuario[0][0]."_".$usuario[3];
        fwrite($script, "GRANT ALL PRIVILEGES ON ".$database.".* TO '".$usuarioFinal."'@'localhost' IDENTIFIED BY 'password'\n");  
    }
    fclose($script);
?>

<h1>GENERADO</h1>