<?php
/**
 * Crear una aplicación que permita mediante un formulario practicar el aprendizaje de los verbos irregulares en inglés.
 * Criterios de validación:
 *      • Array de configuración con todos los verbos.
 * 
 *      • Formulario configuración que permita seleccionar número de verbos y
 *    número de preguntas por verbo. Incluye un input tipo text y una lista desplegable.
 * 
 *      • Formulario de entrada según los datos recogidos en el formulario de
 *    configuración y mostrado conjuntamente.
 * 
 *      • Validación del formulario mostrando el porcentaje de aciertos y marcando de
 *    manera diferenciada los aciertos de los fallos.
 * 
 *      • Opción que permita mostrar todas las respuestas.
 * 
 *      • Aplicar estilos y criterios de usabilidad.    
 */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AprenderVerbos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenido a <span id="title">AprendeVerbos</span></h1>
    <h4>Selecciona el nivel de dificultad</h4>
    <form action="app.php" method="post">
        <label for="verbNumber">Número de Verbos: </label>
        <input name="verbNumber" id="verbNumber" type="number" min="1" max="200" value="1">
        <br>
        <label for="verbQuestionNumber">Nivel de Dificultad: </label>
        <select name="verbQuestionNumber" id="verbQuestionNumber">
            <option value="0">Cascarón de Huevo</option>
            <option value="1">Fácil</option>
            <option value="2">Medio</option>
            <option value="3">Dificil</option>
        </select>
        <br>
        <input id="jugar" type="submit" value="Jugar">
    </form>
</body>
</html>