<?php 
foreach (scandir("../../") as $folder) {
    echo $folder;
    echo("<br>");
}

echo("<br><br><br><br><br><br><br>");

$ejercicios = [
    "ejercicio1" => [
        "titulo" => "Calendario Mensual",
        "descripcion" => "Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual correspondiente. Marcar el día actual en verde y los festivos en rojo.",
        "codigo" => "Código del ejercicio 1",
    ],
    "ejercicio2" => [
        "titulo" => "Ejercicio 2",
        "descripcion" => "Descripción del ejercicio 2",
        "codigo" => "Código del ejercicio 2",
    ],
    "ejercicio3" => [
        "titulo" => "Ejercicio 3",
        "descripcion" => "Descripción del ejercicio 3",
        "codigo" => "Código del ejercicio 3",
    ],
];

foreach ($ejercicios as $ejercicio) {
    echo($ejercicio["titulo"]);
    echo("<br>");
    echo($ejercicio["descripcion"]);
    echo("<br>");
    echo($ejercicio["codigo"]);
    echo("<br>--------------------------------------------------<br>");
};
?>