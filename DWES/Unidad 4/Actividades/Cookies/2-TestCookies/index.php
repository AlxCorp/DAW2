<?php 
setcookie("test", "123123", time()+120);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobador Cookies</title>
</head>
<body>
    <h1>Para comprobar si tu navegador soporta Cookies pulsa el botón</h1>
    <form action="./comprobar.php" method="post">
        <input type="submit" value="COMPROBAR" />
    </form>
</body>
</html>