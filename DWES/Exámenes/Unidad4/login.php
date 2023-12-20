<?php 
require_once('config.php');
session_start();
$post = isset($_POST['usuario']);

if ($post) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (isset($administradores[$usuario])) {
        if ($administradores[$usuario] == $password){
            $_SESSION['login'] = true;
            header('Location: comandas.php');
        } else {
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include("./Templates/boostrap.php") ?>
</head>
<body>
<form method="POST">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Usuario</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Usuario" name="usuario">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormPass">Contraseña</label>
      <input type="password" class="form-control mb-2" id="inlineFormPass" placeholder="Contraseña" name="password">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Entrar</button>
    </div>
  </div>
</form>
</body>
</html>