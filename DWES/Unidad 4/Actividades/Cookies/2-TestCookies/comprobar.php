<?php 
if (isset($_COOKIE['test']) && $_COOKIE['test'] == "123123") {
    echo("<h1>Tu navegador soporta Cookies</h1>");
} else {
    echo("<h1>Tu navegador NO soporta Cookies</h1>");
}
?>