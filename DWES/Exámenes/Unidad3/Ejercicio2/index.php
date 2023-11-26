<?php 

/**
 * for
 * 
 * Este script mostrará un test en inglés el cual será corregido.
 * 
 * for
 * 
 * @DNI 31028528X
 * @AUTHOR Alejandro Priego Izquierdo
 * @DATE 24-11-2023
 */

 require_once("./config.php");

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fromForm = true;
} else {
    $fromForm = false;
}

function getPuntuation() {
    $respuestasBienMal = [];
    $puntutation = 0;
    for ($n = 0; $n < count(PREGUNTAS); $n++) {
        if (PREGUNTAS[$n]["Respuesta"] == $_POST[$n]) {
            array_push($respuestasBienMal, "correcto");
            $puntutation += PREGUNTAS[$n]["Acierto"];
        } else {
            array_push($respuestasBienMal, "incorrecto");
            $puntutation += PREGUNTAS[$n]["Fallo"];
        }
    }

    return [$respuestasBienMal, $puntutation];
}

 ?>

<!-- for -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>AutoTEST</h1>
    <p>Bienvenido al test de Inglés. Suerte!</p>
        <?php 
        if ($fromForm) {
            echo('<b>Nombre</b>: '.$_POST["name"]);
            echo('<br>');
            echo('<b>Idiomas</b>: ');
            echo('<ul>');
            foreach ($_POST["idioms"] as $idioma) {
                echo('<li>'.IDIOMAS[$idioma].'</li>');
            }
            echo('</ul>');
            echo('<b>Puntuación</b>: ');
            echo(getPuntuation()[1]);

            // ------- for

            $puntuacion = getPuntuation()[0];

            foreach(PREGUNTAS as $key => $pregunta) {
                echo('<div class="pregunta">');
                echo('<h2>'.$pregunta["pregunta"].'</h2>');

                $bien = $puntuacion[$key];

                if ($pregunta["Tipo"] == "text") {
                    echo('<input required type="text" name="'.$key.'" class="'.$bien.'" value="'.$_POST[$key].'">');
                } else {
                    echo('<label for="'.$key.'">Selecciona la respuesta correcta: </label><br>');
                    foreach ($pregunta["Opciones"] as $keyR => $respuesta) {
                        if ($keyR == $_POST[$key]) {
                            $checked = "checked";
                        } else {
                            $checked = "";
                        }

                        if ($pregunta["Respuesta"] == PREGUNTAS[$key]["Opciones"][$keyR]) {
                            $incorrecta = "correcto";
                        } else {
                            $incorrecta = "";
                        }

                        echo('<input required type="radio" value="'.$keyR.'" name="'.$key.'" id="'.$key.$keyR.'"'.$checked.'>');
                        echo('<label for="'.$key.$keyR.'" class="'.$incorrecta.'"> '.$respuesta.'</label><br>');
                    }
                }

                echo('</div>');
            }

            
        } else {
            echo('<form action="" method="POST" id="appForm">');
            echo('<div class="nameDiv">');
            echo('<label for="name">Introduce tu nombre: </label>');
            echo('<input type="text" placeholder="Nombre" name="name" id="name" required>');
            echo('</div>');
            echo('<div class="idiomsDiv">');
            echo('<label for="idioms">Introduce tus idiomas: </label>');
            echo('<select name="idioms[]" id="idioms" multiple required>');
            foreach (IDIOMAS as $key => $idioma) {
                echo('<option value="'.$key.'">'.$idioma.'</option>');
            }
            echo('</select>');
            echo('</div>');

            foreach(PREGUNTAS as $key => $pregunta) {
                echo('<div class="pregunta">');
                echo('<h2>'.$pregunta["pregunta"].'</h2>');

                if ($pregunta["Tipo"] == "text") {
                    echo('<input required type="text" name="'.$key.'">');
                } else {
                    echo('<label for="'.$key.'">Selecciona la respuesta correcta: </label><br>');
                    foreach ($pregunta["Opciones"] as $keyR => $respuesta) {
                        echo('<input required type="radio" value="'.$keyR.'" name="'.$key.'" id="'.$key.$keyR.'">');
                        echo('<label for="'.$key.$keyR.'">'.$respuesta.'</label>');
                        echo('<br>');
                    }
                }

                echo('</div>');
            }
            echo('<button type="submit">COREGIR</button>');
            echo('</form>');
        }
    ?>
</body>
</html>

<!-- for -->