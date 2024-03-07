<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortfoliApp</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include_once('header.php') ?>
    <div class="searchDiv">
        <input type="text" name="search" placeholder="Buscar Portfolios..." id="searchInput">
        <div class="resultados">
        </div>
    </div>
    <hr>
    <main>
        <h2>Portfolios Destacados</h2>
        <section>
            <?php foreach($portfolios as $portfolio) {
                $info = $portfolio["info"];
                $jobs = $portfolio["jobs"];
                $projects = $portfolio["projects"];
                $skills = $portfolio["skills"];
                $social_networks = $portfolio["social_networks"];
                ?>

            <article>
                <img src="uploads/img/<?= $info["photo"] ?>" alt="" class="portfolioImg">
                <h3 class="name"><?= $info["name"]." ".$info["surname"] ?></h3>
                <hr>
                <?php if (count($jobs) > 0) { ?>
                    <div class="jobs">
                        <h4 class="sectionTitle">Trabajos</h4>
                        <?php foreach($jobs as $job) { ?>
                        <div class="job">
                            <p class="jobTitle"><?= substr($job["title"], 0, 15) ?></p>
                            <p class="jobDate"><?= $job["start_date"]." | ".$job["finish_date"] ?></p>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if (count($projects) > 0) { ?>
                <div class="projects">
                    <h4 class="sectionTitle">Proyectos</h4>
                    <?php foreach($projects as $project) { ?>
                    <div class="project">
                        <img src="uploads/projectLogos/<?= $project["logo"] ?>" alt="">
                        <p class="projectTitle"><?= $project["title"] ?></p>
                        <p class="projectTechnologies"><?= $project["technologies"] ?></p>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if (count($skills) > 0) { ?>
                <div class="skills">
                    <h4 class="sectionTitle">Skills</h4>
                    <div class="skillsList">
                        <?php foreach($skills as $skill) { ?>
                        <p class="skill"><?= $skill["name"] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <?php if (count($social_networks) > 0) { ?>
                <div class="socialMedias">
                    <?php foreach($social_networks as $social_network) { ?>
                    <a href="<?= $social_network["url"] ?>"><img src="img/icons/<?= strtolower($social_network["name"]) ?>.svg" alt=""></a>
                    <?php } ?>
                </div>
                <?php } ?>
            </article>
            <?php } ?>
        </section>
    </main>
    <script>
        $(document).ready(() => {
            $('input[name="search"]').on('keyup', (e) => {
                var busqueda = e.target.value;

                if (busqueda == "") {
                    $('.resultados').html("");
                } else {
                    $.ajax({
                    url: 'busqueda',
                    type: 'POST',
                    data: {search: busqueda},
                    success: function(resp) {
                        $('.resultados').html(resp);
                    }
                });
                }
            });
        });
    </script>
</body>
</html>