<?php 
/**
 * 
 * @author Alejandro Priego
 * 
 */

$user;
$password;

if (isset($_POST["submit"])) {
    if (isset($_POST["remindMe"])) {
        setcookie("user", $_POST["user"], time() + 3600);
        setcookie("password", $_POST["password"], time() + 3600);
    }
}

if (isset($_COOKIE["user"])) {
    $user = $_COOKIE["user"];
} else {
    $user = "";
}

if (isset($_COOKIE["password"])) {
    $password = $_COOKIE["password"];
} else {
    $password = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="user">User:</label>
        <input type="text" name="user" placeholder="User" id="user"><br>
        <label for="password">Password</label>
        <input type="text" name="password" placeholder="Password" id="password"><br>
        <label for="remindMe">Remind Me: </label>
        <input type="checkbox" name="remindMe" id="remindMe"><br>
        <button type="submit" name="submit">Enviar</button>
    </form>
</body>
</html>