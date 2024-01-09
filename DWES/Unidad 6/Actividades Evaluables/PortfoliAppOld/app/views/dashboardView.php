<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <header>
        <div>
            <img src="uploads/img/<?= $profileImg ?>" alt="Imagen de Perfil">
            <h1>Hola, <?= $userName ?></h1>
        </div>
        <nav>
            <ul>
                <li><a href="http://portfoliapp.com/perfil">Ajustes</a></li>
                <li><a href="http://portfoliapp.com/logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="box trabajos">
            <?php
                foreach ($jobs as $job) {
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                    echo ($job['title'].' | '.$job['visible'].' | '.$job['updated_at'].'<br>');
                }
            ?>
        </div>
        <div class="box proyectos"></div>
        <div class="box redes-sociales"></div>
        <div class="box skills"></div>
    </main>
</body>
</html>