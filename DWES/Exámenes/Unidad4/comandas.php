<?php 
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

$comandas = scandir("./Ficheros/Comandas");
array_shift($comandas);
array_shift($comandas);

$pendientes = [];
$elaboradas = [];

foreach ($comandas as $comanda) {
    if ($comanda[-1] == "e") {
        array_push($pendientes, $comanda);
    } else {
        array_push($elaboradas, $comanda);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandas</title>
    <?php include("./Templates/boostrap.php") ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Estas son las comandas de hoy</h1>
    <br>

    <h3>Pendientes: </h3>
    <div class="pendientes">
        <?php 
        foreach($pendientes as $numero => $pendiente) {
            echo('<div class="card" style="width: 18rem;">');
            echo('<div class="card-body">');
            echo('<h5 class="card-title">Pendiente '.($numero+1).'</h5>');
            echo('<p class="card-text"><a href="./Ficheros/Comandas/'.$pendiente.'">'.$pendiente.'</a></p>');
            echo('<form action="elaborar.php" method="post">');
            echo('<input type="hidden" value="'.$pendiente.'" name="pendiente">');
            echo('<input type="submit" class="btn btn-primary" value="Elaborada">');
            echo('</form>');
            echo('</div></div>');
        }
        ?>
    </div>
    <br><br><br>
    <h3>Elaboradas: </h3>
    <div class="pendientes">
        <?php 
        foreach($elaboradas as $numero => $elaborada) {
            echo('<div class="card" style="width: 18rem;">');
            echo('<div class="card-body">');
            echo('<h5 class="card-title">Elaborada '.($numero+1).'</h5>');
            echo('<p class="card-text"><a href="./Ficheros/Comandas/'.$elaborada.'">'.$elaborada.'</a></p>');
            echo('</div></div>');
        }
        ?>
    </div>
    <br><br><br>
    <form action="./logout.php" method="post">
        <input type="submit" value="CERRAR SESIÓN" class="btn btn-primary btn-lg btn-block"/>
    </form>
</body>
</html>