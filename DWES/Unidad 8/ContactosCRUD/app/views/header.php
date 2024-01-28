<header>
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/get">Ver Contactos</a></li>
            <li><a href="/add">Agregar Contacto</a></li>
            <?php 
                if($_SESSION['loginId'] == 'guest') {
                    echo('<li><a href="/login">Login</a></li>');
                } else {
                    echo('<li><a href="/logout">Logout</a></li>');
                }
            ?>
        </ul>
    </nav>
</header>