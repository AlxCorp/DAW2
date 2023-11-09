<?php
if (!$_POST) {
    header("Location: index.php");
};

require_once("./config/tests_cnf.php");

define ("TESTID", $_POST["testID"]);
$seleccionadas = $_POST["respuesta"];
$solucionario = $aTests[TESTID]["Corrector"];
$correctas = 0;
$incorrectas = 0;

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
    <title>CORRECIÓN: Test <?php echo TESTID+1 ?></title>
    <link rel="stylesheet" href="testStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>CORRECCIÓN: Test de Conducir Número <?php echo TESTID+1 ?></h1>
        <span class="permiso"><?php echo($aTests[TESTID]["Permiso"]) ?></span>
        <span class="categoria"><?php echo($aTests[TESTID]["Categoria"]) ?></span>
    </header>
    <main>
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
                    $emoji = "👎🏻";
                    foreach ($pregunta["respuestas"] as $respuesta) {
                        $checked = ($respuesta[0] == $seleccionadas[$pregunta["idPregunta"]]) ? "checked" : "";
                        $class = ($respuesta[0] == $solucionario[$pregunta["idPregunta"]-1]) ? "bien" : "mal";
                        if ($seleccionadas[$pregunta["idPregunta"]] == $solucionario[$pregunta["idPregunta"]-1]) {
                            $emoji = "👍🏻";
                        }

                        echo('<input '
                        .'disabled '
                        .'type="radio" '
                        .'value="'.$respuesta[0].'" '
                        .'name="respuesta['.$pregunta["idPregunta"].']" '
                        .$checked
                        .'/>'
                    );
                     
                        echo('<label '
                        .'for="'.$pregunta["idPregunta"].$respuesta[0].'" '
                        .'class="'.$class.'" '
                        .'> '.$respuesta.'</label>'
                    );
                        
                        echo('<br>'
                    );

                }
                    echo('<div class="emoji"><span>'.$emoji.'</span></div>');
                    echo('</section>');
            }
            ?>
    </main>
</body>
</html>