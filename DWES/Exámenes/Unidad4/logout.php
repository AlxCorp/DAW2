<?php 
session_start();
#Eliminar todas las variables de sesión
session_unset();
#Destruir la sesión
session_destroy();

setcookie("he_comprado", "", time()-3600);

header('Location: index.php');
?>