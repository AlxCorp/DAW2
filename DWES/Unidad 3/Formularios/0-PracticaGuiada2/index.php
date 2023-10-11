<?php
/**
 * Función para limpiar datos de entrada
 * parametro: cadena procedente de un fomrulario.
 * return: cadena limpia.
 */

function test_input($data)
{
    return htmlspecialchars(stripcslashes(trim($data)));
}

$name = $email = $url = $comment = $gender = "";
$nameErr = $emailErr = $urlErr = $commentErr = $genderErr = $transportErr = $optionErr = "";
$lProcessForm = $lError = false;

$aGender = ["Hombre", "Mujer", "Otro"];

$aTransport = [
    "Transporte 1",
    "Transporte 2",
    "Transporte 3",
    "Transporte 4",
];
$selectedTransports = [];

$aOptions = [
    [
        "valor" => 1,
        "literal" => "Opción 1"
    ],
    [
        "valor" => 2,
        "literal" => "Opción 2"
    ],
    [
        "valor" => 3,
        "literal" => "Opción 3"
    ],
    [
        "valor" => 4,
        "literal" => "Opción 4"
    ]
];
$selectedOption = "";

$aCars = ["Renault", "Mercedes", "Citroen", "Volvo", "Seat"];
$selectedCars = [];


// Lógica
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si viene desde el formulario
    $lprocessForm = true;


    // Validamos Nombre
    if (empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
        $lError = true;
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validamos Email
    if (empty($_POST["email"])) {
        $emailErr = "El email es obligatorio";
        $lError = true;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de correo incorrecto";
            $lError = true;
        }
    }

    // Validamos URL
    if (empty($_POST["url"])) {
        $urlErr = "La URL es obligatoria";
        $lError = true;
    } else {
        $url = test_input($_POST["url"]);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $urlErr = "Formato de URL incorrecto";
            $lError = true;
        }
    }

    // Validamos Comentario
    if (!empty($_POST["comment"])) {
        $comment = test_input($_POST["comment"]);
        }

    // Validamos Género
    if (!isset($_POST["gender"])) {
        $genderErr = "El género es obligatorio";
        $lerror = true;
    } elseif ($_POST["gender"] > count($aGender)) {
        $genderErr = "El género no es válido";
        $lerror = true;
    } else {
        $gender = $_POST["gender"];
    }

    // Validamos Transporte
    if (isset($_POST["transport"])) {
        if (count($_POST["transport"]) > count($aTransport)) {
            $transportErr = "Has seleccionado demasiado elementos";
            $lError = true;
        } else {
            foreach ($_POST["transport"] as $value) {
                if ($value >= count($aTransport)) {
                    $transportErr = "Valores no válidos";
                    $lError = true;
                    break;
                }
            }
            if ($transportErr == "") {
                $selectedTransports = $_POST["transport"];
            }
        }
    }
    
    // Validamos Opción
    if (!empty($_POST["option"])) {
        $encontrado = false;
        foreach ($aOptions as $option) {
            if ($_POST["option"] == $option["valor"]) {
                $encontrado = true;
            }
        }
        if (!$encontrado) {
            $optionErr = "Valores no válidos";
            $lError = true;
        } else {
            $selectedOption = $_POST["option"];
        }
    }

    // Validamos Selección Múltiple Vehículos
    var_dump($_POST["vehicles"]);
    if (!empty($_POST["vehicles"])) {
        if (count($_POST["vehicles"]) > count($aCars)) {
            $carErr = "Has seleccionado demasiado elementos";
            $lError = true;
        } else {
            var_dump($_POST["vehicles"]);
            foreach ($_POST["vehicles"] as $value) {
                foreach ($aOptions as $option) {
                    if (in_array($value, $option)) {
                        $transportErr = "Valores no válidos";
                        $lError = true;
                        break;
                    }
                }
            }
            if ($optionErr == "") {
                $aOptions = $_POST["option"];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <style>
        form {
            text-align: center;
        }

        form>input,
        textarea {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h2>ERROR: "
        <?php var_dump($lError)?>"
    </h2>
    <form action="./" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?php echo ($name) ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo ($email) ?>"><br>

        <label for="url">URL:</label>
        <input type="url" id="url" name="url" value=" <?php echo ($url) ?>"><br>

        <label for="comment">Comentario:</label>
        <textarea id="comment" name="comment" cols="30" rows="10"><?php echo ($comment) ?></textarea><br>

        <?php
        foreach ($aGender as $key => $value) {
            if ($gender == $key) {
                echo ('<input type="radio" name="gender" value="' . $key . '" checked>' . $value);
            } else {
                echo ('<input type="radio" name="gender" value="' . $key . '">' . $value);
            }
        }
        ?><br>

        <?php
        foreach ($aTransport as $key => $value) {
            if (in_array($key, $selectedTransports)) {
                echo ('<input type="checkbox" name="transport[]" value="' . $key . '" checked>' . $value);
            } else {
                echo ('<input type="checkbox" name="transport[]" value="' . $key . '">' . $value);
            }
        }
        ?><br>

        <label for="option">Opciones:</label>
        <select name="option" id="option">
            <?php
            foreach ($aOptions as $value) {
                if ($value["valor"] == $selectedOption) {
                    echo ('<option name="options[]" value="' . $value["valor"] . '" selected>' . $value["literal"]);
                } else {
                    echo ('<option name="options[]" value="' . $value["valor"] . '">' . $value["literal"]);
                }
            }
            ?>
        </select><br>
        
        <label for="vehicles">Vehículos:</label>
        <select name="vehicles" id="vehicles" multiple>
            <?php
            foreach ($aCars as $key => $value) {
                if (in_array($value, $selectedCars)) {
                    echo ('<option name="cars[]" value="' . $key . '" selected>' . $value);
                } else {
                    echo ('<option name="cars[]" value="' . $key . '">' . $value);
                }
            }
            ?>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>

<!--
<?php //echo [Folder Name] ?>

Nombre
Email
url
Comentario
genero -> Radio Button un solo valor
transporte -> Checkbox (puedes seleccionar varios)
Opción -> Combo/Lista Desplegable
Seleccion vehiculos multples -> Lista desplegable que puedes seleccionar varios (atributo multiple)
        -->