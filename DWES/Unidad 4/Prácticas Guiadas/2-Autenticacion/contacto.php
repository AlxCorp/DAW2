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
    <h1>Contacto</h1>
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