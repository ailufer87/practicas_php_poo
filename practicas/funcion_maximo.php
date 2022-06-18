<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aNotas= array(8,6,7,9);
$aSueldos= array (80000,90000,45000,30000);


function maximo($aVector){
    $maximo=$aVector[0];
    foreach($aVector as $vector){
        if ($vector>$maximo){
            $maximo=$vector;

        }
    }
    return $maximo;

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php echo "la nota maxima es:" . maximo($aNotas) . "<br>";
echo "el sueldo maximo es:" . maximo($aSueldos);
?>

</body>
</html>