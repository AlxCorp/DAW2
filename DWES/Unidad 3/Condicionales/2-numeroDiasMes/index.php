<?php
// Introducimos mes y año y mostramos número días mes

$month = 2;
$year = 2023;
$bisiesto = false;
$numDias = 31;

if (($year % 4) == 0 && ($year % 100) != 0 || ($year % 400) == 0) {
    $bisiesto = true;
}

switch ($month) {
    case 4:
    case 6:
    case 9:
    case 11:
        $numDias = 30;
        break;
    case 2:
        if ($bisiesto) {
            $numDias = 29;
            break;
        }
        $numDias = 28;
    }

?>

<h1>El mes <?php echo($month) ?> 
del año <?php echo($year) ?> 
tiene <?php echo($numDias) ?> días 
porque <?php echo($bisiesto ? ("es bisiesto") : ("NO es bisiesto")) ?></h1>