<?php 
require_once("../app/Config/config.php");

session_start();
if (!isset($_SESSION["app_board"])) {
    header('Location: ./logout.php')
}
?>