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
                foreach ($jobs as $job) { ?>
                    <div class="job">
                        <p><?=$job['title']?></p>
                        <p> | </p>
                        <a href="/profile/visible/job/<?=$job['id']?>">
                            <img width="30px" src="/img/<?= ($job['visible'] ? 'openEye' : 'closeEye') ?>.png">
                        </a>
                        <p> | </p>
                        <p><?= substr($job['updated_at'], 0, 10) ?></p>
                        <p> | </p>
                        <a href="/profile/edit/job/<?=$job['id']?>">
                            <img width="30px" src="/img/pencil.png">
                        </a>
                        <p> | </p>
                        <a href="/profile/erase/job/<?=$job['id']?>">
                            <img width="30px" src="/img/trash.png">
                        </a>
                    </div>
                       
                    <?php } ?>
                </div>
            <?php } else { ?>
                <p class="emptyBox">No hay ningún trabajo</p>
            <?php } ?>
            <a class="buttonLink" href="http://portfoliapp.com/profile/add/job"><button class="addButton">Agregar Trabajo</button></a>
        </div>
        <div class="box proyectos">
            <?php
                if ($projects) {
                    echo('<div class="scroll">');
                    foreach ($projects as $project) { ?>
                        <div class="project">
                            <img class="projectLogo" src="/uploads/projectLogos/<?=$project['logo']?>">
                            <p> | </p>
                            <p><?=$project['title']?></p>
                            <p> | </p>
                            <a href="/profile/visible/project/<?=$project['id']?>">
                                <img width="30px" src="/img/<?= ($project['visible'] ? 'openEye' : 'closeEye') ?>.png">
                            </a>
                            <p> | </p>
                            <p><?= substr($project['updated_at'], 0, 10) ?></p>
                            <p> | </p>
                            <a href="/profile/edit/project/<?=$project['id']?>">
                                <img width="30px" src="/img/pencil.png">
                            </a>
                            <p> | </p>
                            <a href="/profile/erase/project/<?=$project['id']?>">
                                <img width="30px" src="/img/trash.png">
                            </a>
                        </div>
                <?php } ?>
                    </div>
                <?php
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
                foreach ($socialNetworks as $socialNetwork) { ?>                
                <div class="socialNetwork">
                    <img class="socialNetworkLogo" src="/img/icons/<?=strtolower($socialNetwork['name'])?>.svg">
                    <p> | </p>
                    <a href="<?= $socialNetwork['url'] ?>"><?=$socialNetwork['name']?></a>
                    <p> | </p>
                    <a href="/profile/visible/socialNetwork/<?=$socialNetwork['id']?>">
                        <img width="30px" src="/img/<?= ($socialNetwork['visible'] ? 'openEye' : 'closeEye') ?>.png">
                    </a>
                    <p> | </p>
                    <p><?= substr($socialNetwork['updated_at'], 0, 10) ?></p>
                    <p> | </p>
                    <a href="/profile/edit/socialNetwork/<?=$socialNetwork['id']?>">
                        <img width="30px" src="/img/pencil.png">
                    </a>
                    <p> | </p>
                    <a href="/profile/erase/socialNetwork/<?=$socialNetwork['id']?>">
                        <img width="30px" src="/img/trash.png">
                    </a>
                </div>
            <?php } ?>
                </div>
            <?php
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
                    foreach ($skills as $skill) { ?>                
                    <div class="skill">
                        <p><?=$skill['name']?></p>
                        <p> | </p>
                        <a href="/profile/visible/skill/<?=$skill['id']?>">
                            <img width="30px" src="/img/<?= ($skill['visible'] ? 'openEye' : 'closeEye') ?>.png">
                        </a>
                        <p> | </p>
                        <p><?= $skill['skill_category'] ?></p>
                        <p> | </p>
                        <p><?= substr($skill['updated_at'], 0, 10) ?></p>
                        <p> | </p>
                        <a href="/profile/edit/skill/<?=$skill['id']?>">
                            <img width="30px" src="/img/pencil.png">
                        </a>
                        <p> | </p>
                        <a href="/profile/erase/skill/<?=$skill['id']?>">
                            <img width="30px" src="/img/trash.png">
                        </a>
                    </div>
                <?php } ?>
                    </div>
                <?php
                } else {
                    echo '<p class="emptyBox">No hay ningúna skill</p>';
                }
                echo '<a href="http://portfoliapp.com/profile/add/skill"><button class="addButton">Agregar Skill</button></a>';
                ?>
        </div>
    </main>
</body>
</html>