<?php 
$post = isset($_POST['usuario']);
$recordar = isset($_POST['recordar']) ? $_POST['recordar'] : "";
var_dump($post);
if ($post) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    if ($recordar) {
        setcookie("usuario", $usuario, time()+60*60*60);
        setcookie("password", $password, time()+60*60*60);
    }
} else {
    if (isset($_COOKIE['usuario'])) {
        $usuario = $_COOKIE['usuario'];
        $password = $_COOKIE['password'];
    } else {
        $usuario = "";
        $password = "";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="usuario">Usuario: </label>
        <input required id="usuario" name="usuario" type="text" value="<?php echo($usuario) ?>">
        <br>
        <label for="password">Contraseña: </label>
        <input required id="password" name="password" type="password" value="<?php echo($password) ?>">
        <br>
        <label for="recordar">¿Recordar?: </label>
        <input type="checkbox" name="recordar" id="recordar">
        <button type="submit">ACCEDER</button>
    </form>
    <?php 
        if ($post && $usuario != "") {
            echo('<p>Usuario:'.$usuario.'</p>');
            echo('<p>Contraseña:'.$password.'</p>');
        }
    ?>
</body>
</html>
