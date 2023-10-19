<?php
    $nombre = "Juan";
    $edad = 30;
    $descripcion = <<<EOD
            Hola, mi nombre es $nombre y tengo $edad años.
            Esto es un ejemplo de cómo usar la sintaxis heredoc
            para crear cadenas de texto largas en PHP.
            EOD;

    echo $descripcion;
?>