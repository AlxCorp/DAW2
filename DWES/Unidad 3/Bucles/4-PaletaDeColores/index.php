<?php
/**
@author: Alejandro Priego
@date: 29/09/2023
@enunciado: Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor
            hexadecimal que le corresponde. Cada celda será un enlace a una página que
            mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los
            conocimientos que tienes?
*/
?>


<table>
    <th>Color</th>
    <th>Hexadecimal</th>
    
    <?php
    for ($x = 0; $x < 10; $x++) {
        echo("<tr>");
        for ($y = 1; $y < 11; $y++) {
            echo("<td>".(($x+1) * $y). "</td>");
        }
        echo("</tr>");
    } ?>

</table>
