<?php
$MONTH = "Enero";
$YEAR = 2023;
$FESTIVOS = [];

$monthDays = [
    "Enero" => 31,
    "Febrero" => 28,
    "Marzo" => 31,
    "Abril" => 30,
    "Mayo" => 31,
    "Junio" => 30,
    "Julio" => 31,
    "Agosto" => 31,
    "Septiembre" => 30,
    "Octubre" => 31,
    "Noviembre" => 30,
    "Diciembre" => 31,
];

function comprobarBisiesto($year): bool {
    if (($year % 4) == 0 && ($year % 100) != 0) {
        if ($year % 400 == 0) {
            return true;
        } else {
            return false;
        }
    }
};


?>