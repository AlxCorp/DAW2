<?php 
session_start();
if (!isset($_SESSION["auth"])) {
    $_SESSION["auth"] = false;
    $_SESSION["user"] = "invitado";

}
$auth = $_SESSION["auth"];
?>