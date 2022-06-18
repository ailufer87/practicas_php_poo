<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



function calcularNeto($bruto){
    $neto= $bruto-($bruto*0.17);
    return $neto;
}

$aEmpleados= array(
    array("DNI" => "33765012", "nombre" => "Ana Acuña", "bruto" => "85000.30"),
    array("DNI" => "23684569", "nombre" => "Gonzale Bustamante", "bruto" => "90000"),
    array("DNI" => "15684569", "nombre" => "Juan Iraola", "bruto" => "100000"),
    array("DNI" => "27684569", "nombre" => "Beatriz Ocampo", "bruto" => "70000"),
);

function contar($aArray){
    $total= 0; //debe estar afuera del bucle
    foreach ($aArray as $item){
        $total++;
    }
     return $total;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arcvhivo empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class =container>
        <div class="row">
            <div class="col 12">
                <h3 class="text-center p-4">LISTADO DE EMPLEADOS</h3>
            </div>
        </div>
        <div class="row">
            <div class="col 12">
                <table class="table table-hover border">
                    <thead>
                        <th>DNI</th>
                        <th>NOMBRE Y APRELLIDO</th>
                        <th>SUELDO NETO</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aEmpleados as $empleado){?>
                            <tr>
                                <td><?php echo $empleado["DNI"]; ?></td>
                            
                                <td><?php echo strtoupper ($empleado["nombre"]); ?></td>
                            
                                <td><?php echo "$". number_format(calcularNeto($empleado["bruto"]), 2, ",", "."); ?></td>
                            </tr>
                         <?php } ?> 
                         <tr>
                             <td>Cantidad de empleados activos: <?php echo contar($aEmpleados) ?></td>
                         </tr>  
                    </tbody>

                </table>
            </div>
        </div>


    </main>


</body>
</html>