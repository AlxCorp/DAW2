<?php 
require_once("../app/Config/config.php");

if (isset($_POST("mine_number")) || isset($_POST("table_size"))) {

};

session_start();
if (!isset($_SESSION["app_board"])) {
    $_SESSION["app_board"] = [];
    $_SESSION["user_board"] = [];

    
}

?>