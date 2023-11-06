<?php
if (!$_POST) {
    header("Location: index.php");
}
;

include("./config/config.php");

$verbNumber = $_POST["verbNumber"];
$verbQuestionNumber = $_POST["verbQuestionNumber"];
$selectedVerbs = [];

$selectedVerbs = array_rand($verbs, $verbNumber);
if (!is_array($selectedVerbs)) {
    $selectedVerbs = array($selectedVerbs);
}

function getRandomPosition() {
    return rand(0,3);
}

function getFieldPositions() {
    global $verbQuestionNumber;
    $ra = [];
    
    if ($verbQuestionNumber > 0) {
        do {
            $temp = getRandomPosition();
            if (!in_array($temp, $ra)) {
                array_push($ra, $temp);
            }
            } while (count($ra) < $verbQuestionNumber);
    }
    
    return $ra;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo ($verbNumber) ?> Verbos
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
        <form action="corregir.php" method="POST" id="formulario">
        <?php 
            foreach ($selectedVerbs as $v) {
                
                $randomFieldPositions = getFieldPositions();
                
                $fields = [];
                
                for ($n = 0; $n < 4; $n++) {
                    if (!in_array($n, $randomFieldPositions)) {
                        array_push($fields, $verbs[$v][$n]);
                    } else {
                        array_push($fields, '<input type="text" name="verbs['.$v.']['.$n.']" required>');
                    }
                }

                echo("<tr>");
                echo ("<td>".$fields[0]."</td>");
                echo ("<td>".$fields[1]."</td>");
                echo ("<td>".$fields[2]."</td>");
                echo ("<td>".$fields[3]."</td>");
                echo("</tr>");
            }
            ?>
            <input type="hidden" name="selectedVerbs" value="<?php echo implode(',', $selectedVerbs); ?>">
        </form>
    </table>
    <?php 
        if ($verbQuestionNumber > 0) {
            echo('<input type="submit" value="Comprobar" form="formulario" id="comprobar">');
        }
    ?>
</body>

</html>