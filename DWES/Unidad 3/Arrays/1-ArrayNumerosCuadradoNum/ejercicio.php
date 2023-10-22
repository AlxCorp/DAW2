<?php

$nums = [1,2,3,4,5,6];

$cuadradoNumero = array_map(function ($num) {
    return $num ^ 2;   
}, $nums);


print_r($cuadradoNumero);
?>