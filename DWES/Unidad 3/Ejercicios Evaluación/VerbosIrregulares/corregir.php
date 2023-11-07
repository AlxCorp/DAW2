<?php
if (!$_POST) {
    header("Location: index.php");
};

include("./config/config.php");

$selectedVerbs = explode(",", $_POST["selectedVerbs"]);
$correctos = 0;
$incorrectos = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Corrección Verbos
    </title>
    <link rel="stylesheet" href="appstyle.css">
</head>

<body>
    <table>
        <tr>
            <th>Infinitivo</th>
            <th>Pasado Simple</th>
            <th>Pasado Participio</th>
            <th>Traducción</th>
        </tr>
        <form action="corregir.php" method="POST">
        <?php 
            $verbsFromApp = [];

            foreach ($_POST["verbs"] as $verb => $columns) {
                $verbColumnsAndResponse = [];
                foreach ($columns as $column => $response) {
                    $verbColumnsAndResponse[$column] = $response;
                }
                $verbsFromApp[$verb] = $verbColumnsAndResponse;
            }

            $fieldsToReturnAll = [];

            foreach ($selectedVerbs as $v) {

                $fields = [];
                $fieldsToReturn = [];

                if ($verbsFromApp[$v]) {
                    for ($n = 0; $n < 4; $n++) {
                        if (array_key_exists($n, $verbsFromApp[$v])) {
                            $correccion = "";
                            if ($verbsFromApp[$v][$n] == $verbs[$v][$n]) {
                                $correccion = "correcto";
                                $correctos++;
                            } else {
                                $correccion = "incorrecto";
                                $incorrectos++;
                            }

                            array_push($fields, '<input class="'.$correccion.'" value="'.$verbsFromApp[$v][$n].'" disabled>');
                            array_push($fieldsToReturn, '<input class="'.$correccion.'" value="'.$verbs[$v][$n].'" disabled>');
                        } else {
                            array_push($fields, $verbs[$v][$n]);
                            array_push($fieldsToReturn, '<td>'.$verbs[$v][$n].'</td>');
                        }
                    }
                }
                
                echo("<tr>");
                echo ("<td>".$fields[0]."</td>");
                echo ("<td>".$fields[1]."</td>");
                echo ("<td>".$fields[2]."</td>");
                echo ("<td>".$fields[3]."</td>");
                echo("</tr>");

                array_push($fieldsToReturnAll, $fieldsToReturn);
            }
        ?>
        </form>
    </table>
    <h1 class="correctos">Aciertos: <?php echo($correctos) ?></h1>
    <h1 class="incorrectos">Fallos: <?php echo($incorrectos) ?></h1>
    <h1 class="porcentaje">Porcentaje de Aciertos: <?php echo(($correctos*100)/($correctos + $incorrectos)."%") ?></h1>

    <?php 
        if ($incorrectos == 0) {
            echo('<h1 class="winned">🧅🍐🧅🍐!!!!CONGRATULATIONS!!!!🍐🧅🍐🧅</h1>');
        } else {
            $valorCampoHidden = serialize($fieldsToReturnAll);
            $valorCampoHiddenEscapado = htmlspecialchars($valorCampoHidden, ENT_QUOTES, 'UTF-8');

            echo('<form action="respuestas.php" method="POST">');
                echo('<input type="hidden" value="'.$valorCampoHiddenEscapado.'" name="allVerbs">');
                echo('<input type="submit" value="Mostrar Respuestas" id="mostrarRespuestas">');
            echo('</form>');
        }
    ?>


</body>
</html> 