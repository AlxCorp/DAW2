<?php 

if ($_POST['new_cookie']) {
    $cookieName = $_POST['cookieName'];
    $cookieValue = $_POST['cookieValue'];
    $cookieExpiration = $_POST['cookieExpiration'];

    setcookie($cookieName, $cookieValue, time()+60*$cookieExpiration);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRD Cookies</title>
</head>
<body>
    <form action="" method="POST">
        <label for="cookieName">Nombre: </label>
        <input id="cookieName" name="cookieName" type="text">
        <br>
        <label for="cookieValue">Valor: </label>
        <textarea id="cookieValue" name="cookieValue" rows="10" cols="50"></textarea>
        <br>
        <label for="cookieExpiration">Expiración (En minutos): </label>
        <input id="cookieExpiration" name="cookieExpiration" type="number">
    </form>
</body>
</html>