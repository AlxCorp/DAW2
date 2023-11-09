<?php 
if (!$_GET["test"]) {
    header("Location: index.php");
}

define ("TESTID", $_GET["test"]-1);

require_once("./config/tests_cnf.php");

$preguntas = $aTests[TESTID]["Preguntas"];
$images = scandir("./img/dir_img_test".TESTID+1);
unset($images[0]);
unset($images[1]);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Número <?php echo TESTID+1 ?></title>
    <link rel="stylesheet" href="testStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Test de Conducir Número <?php echo TESTID+1 ?></h1>
        <span class="permiso"><?php echo($aTests[TESTID]["Permiso"]) ?></span>
        <span class="categoria"><?php echo($aTests[TESTID]["Categoria"]) ?></span>
    </header>
    <main>
        <form action="corregir.php" method="POST">
            <?php
            foreach ($preguntas as $pregunta) {
                echo('<section>');
                if (array_search("img".$pregunta["idPregunta"].".jpg", $images)) {
                        echo('<img src="./img/dir_img_test'.(TESTID+1).'/img'.$pregunta["idPregunta"].'.jpg">');
                    } else {
                        echo('<img src="./img/placeholder.jpg">');
                    }
                    echo('<span class="questionTitle">'.$pregunta["Pregunta"].'</span>');
                    echo('<hr>');
                    foreach ($pregunta["respuestas"] as $respuesta) {
                        echo('<input id="'.$pregunta["idPregunta"].$respuesta[0].'" type="radio" value="'.$respuesta[0].'" name="respuesta['.$pregunta["idPregunta"].']" required/>');
                        echo('<label for="'.$pregunta["idPregunta"].$respuesta[0].'"> '.$respuesta.'</label>');
                        echo('<br>');
                    }
                    
                    echo('</section>');
                }
            ?>
            <div id="corregirContainer">
                <input type="hidden" name="testID" value="<?php echo(TESTID) ?>">
                <input type="submit" id="corregir" value="CORREGIR">
            </div>
        </form>
    </main>
</body>
</html>