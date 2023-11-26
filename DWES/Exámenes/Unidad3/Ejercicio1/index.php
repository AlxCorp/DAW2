<?php 

/**
 * for
 * 
 * Este script mostrará el horario almacenado en un array del 
 * curso elegido entre los disponibles en la lista desplegable.
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

function getCursosName() {
    $cursosName = [];

    foreach (HORARIOS as $cursoID => $curso) {
        $cursosName[$cursoID] = $curso["grupo"];
    }

    return($cursosName);
}

function getHorarioFromDia($cursoID, $diaSemana) {
    $diaCompletoParaDevolver = [];
    $cursoCompleto = HORARIOS[$cursoID];
    $cursoHorario = $cursoCompleto["horario"];

    foreach ($cursoHorario as $asignaturaName => $asignaturaData) {
        foreach ($asignaturaData["horas"] as $asignaturaDataHora) {
            if ($asignaturaDataHora["Dia"] == $diaSemana) {
                $diaCompletoParaDevolver[$asignaturaDataHora["Hora"][0]] = $asignaturaName;
            }
        }
        
    }
    
    return($diaCompletoParaDevolver);
}

function printTableWithAllDays() {
    $days = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
    $table = [];
    $tableToReturn = [];

    foreach ($days as $day) { 
        array_push($table, getHorarioFromDia($_POST["cursos"], $day));
    }

    for ($n = 1; $n < 7; $n++) {
        $temp = "";
        $temp .= '<tr>';
        foreach ($table as $allDaysOneHour) {
            $temp .= '<td class="'.$allDaysOneHour[$n].'">'.$allDaysOneHour[$n].'</td>';
        }
        $temp .= '</tr>';
        array_push($tableToReturn, $temp);
    }

    return $tableToReturn;


    

}

$cursosName = getCursosName();

 ?>

<!-- for -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><span>CALENDARIO</span> Personal</h1>
    <p>Este script mostrará el horario almacenado en un array del curso 
        elegido entre los disponibles en la lista desplegable.</p>
    <?php 
        echo('<form method="POST">');
        echo('<label for="cursos">Selecciona el curso: </label>');
        echo('<select id="cursos" name="cursos">');
        foreach ($cursosName as $cursoID => $cursoName) {
            echo('<option value="'.$cursoID.'">'.$cursoName.'</option>');
        }
        echo('</select>');
        echo('<button type="submit">MOSTRAR HORARIO</button>');
        echo("</form>");

        if ($fromForm) {
            $finalTable = printTableWithAllDays();
            echo('<table>');
                echo('<tr>');
                    echo('<th>Lunes</th>');
                    echo('<th>Martes</th>');
                    echo('<th>Miércoles</th>');
                    echo('<th>Jueves</th>');
                    echo('<th>Viernes</th>');
                echo('</tr>');
                foreach ($finalTable as $horaRow) {
                    echo($horaRow);
                }
            echo('</table>');

            foreach (HORARIOS[$_POST["cursos"]]["horario"] as $asigName => $asigData) {
                echo('<p class="teacher">('.$asigName.') - '.$asigData["nombre"].' --> '.$asigData["profesor"].'</p>');
            }
        }
    ?>
</body>
</html>

<!-- for -->