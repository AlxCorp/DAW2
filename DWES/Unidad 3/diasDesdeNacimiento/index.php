<?php
//https://www.anerbarrena.com/php-date-1018/

$day = date("j"); // Día del mes, sin ceros iniciales, de 1 a 31
$month = date("n"); // Mes actual en digitos sin 0 inicial, de 1 a 12
$year = date("Y"); // Año actual con 4 dígitos, ej 2013

$birthDay = 29;
$birthMonth = 8;
$birthYear = 2003;

$days = 0;
$months = $month - $birthMonth;
$years = $year - $birthYear;

?>

<h1>DÍAS: <?php echo($days) ?></h1>
<h1>MESES: <?php echo($months) ?></h1>
<h1>AÑOS: <?php echo($years) ?></h1>

