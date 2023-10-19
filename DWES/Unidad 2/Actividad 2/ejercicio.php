<?php
/*
Script para mostrar un portfolio basado en una plantilla
Author: Alejandro Priego
Date: 25/09/2023
*/

//Variables
$email = "alejandor@pfagot.com";
$phone = "617555743";
$nombre = "Alejandro";
$apellidos = "Priego Izquierdo";
$linkedin = "https://www.linkedin.com/in/apriego/";
$twitter = "https://www.twitter.com/priegoooo/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Priego - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Unidad 1</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Unidad 2</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Unidad 3</button>
            </li>
        </ul>
    </header>

    <main style="text-align: center">
        <h1><?php echo $nombre, " ", $apellidos?></h1>
        <h3>Teléfono: <?php echo $phone ?></h3>
        <h3>Email: <?php echo $email ?></h3>
        <h3>Linkedin: <a href="<?php echo $linkedin ?>">LINKEDIN</a></h3>
        <h3>Twitter: <a href="<?php echo $twitter ?>">TWITTER</a></h3>
    </main>
</body>
</html>
