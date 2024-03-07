<?php 
    if (isset($_SESSION['userId'])) {
        $logged = true;
    } else {
        $logged = false;
    }
?>

<header>
    <a href="/"><img src="/img/logo/png/portfoliapp-high-resolution-logo-black-transparent-letters.png" height="50px"></a>
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