<?php 
if (!isset($_COOKIE['visitas'])) {
    setcookie("visitas", $_COOKIE['visitas'], time()+60*60*60);
} else {
    setcookie("visitas", $_COOKIE['visitas']+1, time()+60*60*60, '/');
}

$visitas = $_COOKIE['visitas'];
?>

<h1>Has realizado <?php echo($_COOKIE['visitas']) ?> visitas a la web.</h1>