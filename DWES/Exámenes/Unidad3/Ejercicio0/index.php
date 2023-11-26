<?php 

/**
 * for
 * 
 * Este script generará una password en base al DNI del usuario. Esta password se generará en base
 * al resto de la división por siete de la suma de todos los números del DNI introducido.
 * 
 * @DNI 31028528X
 * @AUTHOR Alejandro Priego Izquierdo
 * @DATE 24-11-2023
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fromForm = true;
} else {
    $fromForm = false;
}

if ($fromForm) {
    define("APASSWORDS", ["array", "for", "while", "foreach", "if", "function", "echo", "switch"]);
    
    // Función para generar la contraseña
    function getPassword($dni) {
        // Validamos que DNI es válido
        if (strlen($dni) != 9) {
            throw new Exception('DNI NO Válido');
        }
    
        $suma = 0; // Variable de suma total
    
        // Sumamos números DNI a variable $suma
        for ($character = 0; $character < strlen($dni)-1; $character++) {
            $suma += $dni[$character];
        }
    
        // Obtenemos el resto y la key
        $key = $suma % 7;
        $key = APASSWORDS[$key];
    
        return $key;
    
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo Password DNI</title>
</head>
<body>
    <h1>Calculadora <span>PASSWORD</span> de DNI</h1>
    <p>Este script generará una password en base al DNI del usuario. Esta password se generará en base 
        al resto de la división por siete de la suma de todos los números del DNI introducido.</p>
    <?php 
        if ($fromForm) {
            try {
                echo('<h2>Tu contraseña es: <span>'.getPassword($_POST["dni"]).'</span></h2>');
            } catch (Exception $e) {
                echo('<span class="error">'.$e->getMessage().'</span>');
                echo('<br><a href="./">Volver a Inicio</a>');
            }

        } else {
            echo('<form action="" method="POST">');
                echo('<label for="dni"></label>');
                echo('<input type="text" id="dni" name="dni">');
                echo('<button type="submit">GENERAR PASSWORD</button>');
            echo('</form>');
        }
    ?>
</body>
</html>

<!-- for -->