<?php 
    if (isset($_SESSION['userId'])) {
        $logged = true;
    } else {
        $logged = false;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortfoliApp</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <a href=""><img src="img/logo/png/portfoliapp-high-resolution-logo-black-transparent-letters.png" height="50px"></a>
        <nav>
            <ul>
                <?php 
                if (!$logged) {
                ?>
                    <li><a href="/registro">Registro</a></li>
                    <li><a href="/login">Login</a></li>
                <?php 
                } else {
                ?>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/logout">Cerrar Sesión</a></li>
                <?php 
                }
                ?>

            </ul>
        </nav>
    </header>
</body>
</html>