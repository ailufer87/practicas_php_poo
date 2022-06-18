<?php
$valor= rand(1,5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if ($valor%2==0) {
    echo "el numero $valor es par";
}
else {
    echo "el numero $valor es impar";
}
?>

</body>
</html>