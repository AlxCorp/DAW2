<?php 

function whiteName() {
    if ($_POST['cookieName'] == "") {
        return true;
    }
    return false;
}

$white = false;
$action = "";

if (isset($_POST['new_cookie'])) {
    if (!whiteName()) {
        $cookieName = $_POST['cookieName'];
        $cookieValue = $_POST['cookieValue'];
        $cookieExpiration = $_POST['cookieExpiration'];
    
        setcookie($cookieName, $cookieValue, time()+(60*(int)$cookieExpiration));
    
        $action = "new";
    } else {
        $white = true;
    }

} else if (isset($_POST['check_cookie'])) {
    if (isset($_COOKIE[$_POST['cookieName']])) {
        $cookieName = $_POST['cookieName'];
        $cookieLeida = $_COOKIE[$_POST['cookieName']];
    } else {
        $cookieLeida = "No existe esa cookie";
    }
    $action = "check";

} else if (isset($_POST['erase_cookie'])) {
    if (isset($_COOKIE[$_POST['cookieName']])) {
        $cookieName = $_POST['cookieName'];
        setcookie($cookieName, '', time()-3600);
    } else {
        $cookieLeida = "No existe esa cookie";
    }
    $action = "erase";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRD Cookies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        if ($white) {
            echo('<h1>NO PUEDES DEJAR EL NOMBRE EN BLANCO</h1>');
        } else if ($action == "") {
            include("./forms.php");
        } else if ($action == "new") {
            echo('<h1Cookie Creada Correctamenteh1>');
            include("./forms.php");
        } else if ($action == "check") {
            echo('<h1>Info de la cookie "'.$cookieName.'"</h1>');
            echo('<p>Valor de la cookie: '.$cookieLeida.'</p>');
        } else if ($action == "erase") {
            echo('<h1>Cookie Eliminada Correctamente</h1>');
            include("./forms.php");
        }
    ?>
</body>
</html>