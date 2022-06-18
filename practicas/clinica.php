<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array(
    array("DNI" => "33765012", "nombre" => "Ana Acuña", "edad" => "45", "peso" => "81.5"),
    array("DNI" => "23684569", "nombre" => "Gonzale Bustamante", "edad" => "66", "peso" => "79"),
    array("DNI" => "15684569", "nombre" => "Juan Iraola", "edad" => "28", "peso" => "79"),
    array("DNI" => "27684569", "nombre" => "Beatriz Ocampo", "edad" => "50", "peso" => "79"),
);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-4">
                <h1 class="text-center">Listado de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-4">
                <table class="table table-hover border">
                    <thead>
                        <th>DNI</th>
                        <th>Nombre y apellido</th>
                        <th>Edad</th>
                        <th>Peso</th>
                    </thead>
                    <tbody>
                    <?php foreach ($aPacientes as  $paciente){ ?> <!--IMPORTANTE!!!-->
                        <tr>
                            <td> 
                                <?php echo $paciente["DNI"] ; 
                                    ?>
                            </td>
                             <td> 
                                 <?php echo $paciente["nombre"] ; 
                                    ?>
                            </td>
                            <td>
                                <?php echo $paciente["edad"] ; 
                                    ?>
                            </td>
                            <td>
                                <?php echo $paciente["peso"] ; 
                                    ?>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>


    </main>

</body>

</html>