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
                <li><a href="http://portfoliapp.com/profile/edit">Ajustes</a></li>
                <li><a href="http://portfoliapp.com/logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="box trabajos">
            <?php
            if ($jobs) {
                echo('<div class="scroll">');
                foreach ($jobs as $job) {
                    echo ('<p>'
                                .$job['title'].' | '
                                .'<a href="/profile/visible/job/'.$job['id'].'">'
                                    .($job['visible'] ? '<img width="30px" src="/img/openEye.png">' : '<img width="30px" src="/img/closeEye.png">')
                                .'</a>'.' | '
                                .substr($job['updated_at'], 0, 10).' | '
                            .'</p>'
                            );
                }
                echo('</div>');
            } else {
                echo '<p class="emptyBox">No hay ningún trabajo</p>';
            }
            echo '<a class="buttonLink" href="http://portfoliapp.com/profile/add/job"><button class="addButton">Agregar Trabajo</button></a>';
            ?>
        </div>
        <div class="box proyectos">
            <?php
                if ($projects) {
                    echo('<div class="scroll">');
                    foreach ($projects as $project) {
                        echo ('<p>
                                <img class="projectLogo" src="uploads/projectLogos/'.$project['logo'].'"> | '
                                .$project['title'].' | '
                                .'<a href="/profile/visible/project/'.$project['id'].'">'
                                    .($project['visible'] ? '<img width="30px" src="/img/openEye.png">' : '<img width="30px" src="/img/closeEye.png">')
                                .'</a>'.' | '
                                .substr($project['updated_at'], 0, 10).' | '
                            .'</p>'
                            );
                    }
                    echo('</div>');
                } else {
                    echo '<p class="emptyBox">No hay ningún proyecto</p>';
                }
                echo '<a href="http://portfoliapp.com/profile/add/project"><button class="addButton">Agregar Proyecto</button></a>';
                ?>
        </div>
        <div class="box redes-sociales">
            <?php
            if ($socialNetworks) {
                echo('<div class="scroll">');
                foreach ($socialNetworks as $socialNetwork) {
                    echo ('<p>'
                                .$socialNetwork['name'].' | '
                                .'<a href="'.$socialNetwork['url'].'">'.$socialNetwork['url'].'</a>'.' | '
                                .substr($socialNetwork['updated_at'], 0, 10).' | '
                            .'</p>'
                            );
                }
                echo('</div>');
            } else {
                echo '<p class="emptyBox">No hay ninguna red social</p>';
            }
            echo '<a href="http://portfoliapp.com/profile/add/socialNetwork"><button class="addButton">Agregar Red Social</button></a>';
            ?>
        </div>
        <div class="box skills">
            <?php
                if ($skills) {
                    echo('<div class="scroll">');
                    foreach ($skills as $skill) {
                        echo ('<p>'
                                .$skill['name'].' | '
                                .'<a href="/profile/visible/skill/'.$skill['id'].'">'
                                    .($skill['visible'] ? '<img width="30px" src="/img/openEye.png">' : '<img width="30px" src="/img/closeEye.png">')
                                .'</a>'.' | '
                                .$skill['skill_category'].' | '
                                .substr($skill['updated_at'], 0, 10).' | '
                            .'</p>'
                            );
                    }
                    echo('</div>');
                } else {
                    echo '<p class="emptyBox">No hay ningúna skill</p>';
                }
                echo '<a href="http://portfoliapp.com/profile/add/skill"><button class="addButton">Agregar Skill</button></a>';
                ?>
        </div>
    </main>
</body>
</html>