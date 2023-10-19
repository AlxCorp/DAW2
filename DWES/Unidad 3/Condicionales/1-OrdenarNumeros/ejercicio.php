<?php

$a = 1;
$b = 8;
$c = 4;

$nums = [];

array_push($nums, $a, $b, $c);
sort($nums);

$a = $nums[0];
$b = $nums[1];
$c = $nums[2];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <h1>
        <?php echo ($a) ?>
    </h1>
    <h1>
        <?php echo ($b) ?>
    </h1>
    <h1>
        <?php echo ($c) ?>
    </h1>
</body>

</html>