<?php
/**
@author: Alejandro Priego
@date: 29/09/2023
@enunciado: Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor
            hexadecimal que le corresponde. Cada celda será un enlace a una página que
            mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los
            conocimientos que tienes?
*/

$INCREMENTO = 40;
$headerCounter = 1;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        a {
            text-align: center;
            color: black;
            display: block;
            text-decoration: none;
        }
        .boton {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3498db;
            /* Color de fondo */
            color: #ffffff;
            /* Color del texto */
            font-size: 24px;
            border: none;
            border-radius: 4px;
            /* Bordes redondeados */
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .boton:hover {
            background-color: #2980b9;
        }
        </style>
</head>
<body>
    <a href="https://github.com/AlxCorp/DAW2/tree/main/DWES/Unidad%203/Bucles/4-PaletaDeColores"
        class="boton">GitHub</a>
    <table>
        <th>Color</th>
        <?php
            for ($n = 0; $n+$INCREMENTO < 255; $n += $INCREMENTO) {
                echo("<th> Variante ".$headerCounter."</th>");
                $headerCounter++;
            }
        
        ?>
    
        <?php
            for ($r = 255; $r >= 0; $r -= $INCREMENTO) {
                for ($g = 255; $g >= 0; $g -= $INCREMENTO) {
                    echo("<tr>");
                    for ($b = 255; $b >= 0; $b -= $INCREMENTO) {
                        echo(
                            '<td style="background-color: rgb('.$r.','.$g.','.$b.');'.
                                        'width: 50px; height: 50px;">'
                                .'<a href="./color.php?color='.dechex($r).dechex($g).dechex($b).'">'
                                    .dechex($r).dechex($g).dechex($b)
                                ."</a>"
                            .'</td>');
                    }
                    echo("</tr>");
                }
            }
    
        ?>
    
    </table>
</body>
</html>

