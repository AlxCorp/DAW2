<?php 
if (isset($_POST['pendiente'])) {
    $elaborado = str_replace("pendiente", "elaborada", $_POST['pendiente']);
 rename("./Ficheros/Comandas/".$_POST['pendiente'], "./Ficheros/Comandas/".$elaborado);
    header('Location: comandas.php');
} else {
    header('Location: index.php');
}
?>