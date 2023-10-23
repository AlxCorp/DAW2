<?php 
/**
 * 
 * 
 */

if (!isset($_POST["submit"]) || ($_POST["user"] == "") || ($_POST["password"] == "")) {
    header("location: index.php");
}

session_start();
include("config/config.php");
include("lib/function.php");

$user = clearData($_POST["user"]);
$password = clearData($_POST["password"]);

function userExists($user) {
    global $usuarios;
    foreach ($usuarios as $usuario) {
        if ($user == $usuario["user"]) {
            return true;
        }
         return false;
    }
};

function passwordExists($password) {
    global $usuarios;
    foreach ($usuarios as $usuario) {
        if ($password == $usuario["psw"]) {
            return true;
        }
         return false;
    }
};

if (userExists($user) && userExists($password)) { 
    echo($user." , ".$password);
} else {
    echo("No encontrado");
}
?>