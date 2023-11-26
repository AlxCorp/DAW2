<?php

/* Ejercicio 1.
 *
 * Este es un array con dos dimensiones en el cual se almacenan los horarios de todas las asignaturas de
 * dos grados superiores (1º y 2º de DAW).
 *
 */

define("HORARIOS", [
    [
        "grupo" => "2º DAW A",
        // En este array encontramos las diferentes asignaturas (nombre como clave y array como valor)
        "horario" => [
            // En este array encontramos los datos de la asignatura (nombre, profesor y horas, horas contiene dia y hora)
            "DWES" => [
                "nombre" => "Desarrollo web en entorno servidor",
                "profesor" => "José Aguilera",
                // Este array contiene las horas de clase (día y hora).
                "horas" => [
                    // Array que contiene el día y hora de cada "hora" de clase
                    [
                        "Dia" => "Lunes",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Lunes",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "4ª",
                    ],
                ],
            ],
            "DWEC" => [
                "nombre" => "Desarrollo Web en entorno cliente",
                "profesor" => "Lourdes Magarín",
                "horas" => [
                    [
                        "Dia" => "Lunes",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Lunes",
                        "Hora" => "4ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "4ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "4ª",
                    ],
                ],
            ],
            "DIWEB" => [
                "nombre" => "Diseño de Interfaces WEB",
                "profesor" => "Jaime Rabasco",
                "horas" => [
                    [
                        "Dia" => "Lunes",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Lunes",
                        "Hora" => "6ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "6ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "2ª",
                    ],
                ],
            ],
            "HLC" => [
                "nombre" => "Desarrollo Web en entorno cliente",
                "profesor" => "Alejandro Priego Izquierdo",
                "horas" => [
                    [
                        "Dia" => "Viernes",
                        "Hora" => "6ª",
                    ],
                ],
            ],
            "DAWEB" => [
                "nombre" => "Despliegue de Aplicaciones WEB",
                "profesor" => "MC Tripiana",
                "horas" => [
                    [
                        "Dia" => "Martes",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "6ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "5ª",
                    ],
                ],
            ],
            "EIEM" => [
                "nombre" => "Empresa e Iniciativa Emprendedora",
                "profesor" => "Raquel",
                "horas" => [
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "4ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "6ª",
                    ],
                ],
            ],
        ],
    ],
    [
        "grupo" => "1º DAW A",
        "horario" => [
            "PROG" => [
                "nombre" => "Programación",
                "profesor" => "Rafael del Castillo",
                "horas" => [
                    [
                        "Dia" => "Lunes",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Lunes",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "4ª",
                    ],
                ],
            ],
            "BADA" => [
                "nombre" => "Base de Datos",
                "profesor" => "Amelia Pérez",
                "horas" => [
                    [
                        "Dia" => "Lunes",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Lunes",
                        "Hora" => "4ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "4ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "2ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "4ª",
                    ],
                ],
            ],
            "LLMM" => [
                "nombre" => "Lenguaje de Marcas",
                "profesor" => "ML Magarín",
                "horas" => [
                    [
                        "Dia" => "Lunes",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Lunes",
                        "Hora" => "6ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Jueves",
                        "Hora" => "6ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "1ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "2ª",
                    ],
                ],
            ],
            "EEDD" => [
                "nombre" => "Entornos de Desarrollo",
                "profesor" => "Jaime Rabasco",
                "horas" => [
                    [
                        "Dia" => "Viernes",
                        "Hora" => "6ª",
                    ],
                ],
            ],
            "FOL" => [
                "nombre" => "Formación y Orientación Laboral",
                "profesor" => "M. Gema",
                "horas" => [
                    [
                        "Dia" => "Martes",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Martes",
                        "Hora" => "6ª",
                    ],
                    [
                        "Dia" => "Viernes",
                        "Hora" => "5ª",
                    ],
                ],
            ],
            "SIS" => [
                "nombre" => "Sistemas",
                "profesor" => "M. Ángel",
                "horas" => [
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "3ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "4ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "5ª",
                    ],
                    [
                        "Dia" => "Miércoles",
                        "Hora" => "6ª",
                    ],
                ],
            ],
        ],
    ],
]);
?>
