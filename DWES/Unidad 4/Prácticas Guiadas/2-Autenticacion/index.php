<?php
/**
 * 
 * 
 * 
 */

include('include/session_head.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestor de Sesiones</title>
</head>

<body>
    <h1>Autentificación Básica</h1>
    <div class="auth">
        <?php
        if ($auth) {
            echo "Bienvenido" . $_SESSION["user"];
            echo '<a href="cerrarsesion.php"></a>';
        } else {
            include('include/login_form.php');
        }
        ?>
    </div>
    <div class="navigation">
        <?php
            if ($auth) {
                include('include/loged_nav.php');
            } else {
                include('include/guest_nav.php');
            }
        ?>
    </div>
    <h2>
        Pública 1
    </h2>
</body>

</html>