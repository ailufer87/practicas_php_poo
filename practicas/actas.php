<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array(
    array("ID" => "1", "nombre" => "Juan Perez","notas" => array( 9 ,8)),
    array("ID" => "2", "nombre" => "Ana Valle", "notas" => array( 4 ,9)),
    array("ID" => "3", "nombre" => "Gonzalo Roldan", "notas" => array( 7 ,7)),
);


function promediar($aNumeros){  //las $aNotas del array pasan a ser $aNumeros ahora
    $total=0; 
    foreach ($aNumeros as $numero) {
        $total= $total+ $numero ;  //$total+=numero
    }

    $promedio=$total /count($aNumeros);
    return $promedio;
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
    <main class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center p-3">Actas</h1>
            <table class="table table-dark table-hover border">
                <thead>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Promedio</th>
                </thead>
                    <?php  $promedioCursada=0;
                            $sumatoria=0;
                        foreach ($aAlumnos as $alumno): ?>
                    <tr>
                        <td> <?php echo $alumno["ID"] ?> </td>
                        <td><?php echo $alumno["nombre"] ?></td>
                        <td><?php echo $alumno["notas"][0] ?></td>
                        <td><?php echo $alumno["notas"][1] ?></td>
                        <td><?php echo $promedio= promediar($alumno["notas"])?></td>
                    </tr>
                    <?php 
                        $sumatoria= $sumatoria + $promedio;
                        endforeach;
                        $promedioCursada= $sumatoria/ count($aAlumnos);
                     ?>
            </table>
        <div class="row">
            <div class="col-12">
                <p>El promedio de la cursada es: <?php echo $promedioCursada; ?> </p>
            </div>
        </div>
    </div>
</body>