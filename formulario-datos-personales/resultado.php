<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST){
    $nombre = $_POST ["txtName"];
    $Dni = $_POST ["txtDni"];
    $Tel = $_POST ["txtTel"];
    $Edad = $_POST ["txtEdad"];
}

$aFormulario= array (
    array ("nombre"=> $nombre,"DNI"=> $Dni , "telefono" => $Tel, "edad"=> $Edad ));



?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario datos personales</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <main class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Resultados</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Telefono</th>
                            <th>Edad</th>
                        </thead>
                        <tbody>
                            <?php foreach ($aFormulario as $item){ ?>   <!-- no era necesario el foreach porque solo agrega un item-->
                            <td><?php echo $item ["nombre"] ?></td>
                            <td><?php echo $item ["DNI"] ?></td>
                            <td><?php echo $item ["telefono"] ?></td>
                            <td><?php echo $item ["edad"] ?></td>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </body>

</html>