<?php
$nombre = "Nadia Ailen Fernandez";
$fecha = date("d/m/Y");
$edad = 34;
$aPeliculas = array("Titanic", "Volver al futuro", "El dia despues de mañana");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="text-center">Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>

                        <th>
                            Fecha
                        </th>

                        <td>
                            <?php echo $fecha; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre y apellido
                        </th>
                        <td>
                            <?php echo $nombre; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Edad
                        </th>
                        <td>
                            <?php echo $edad; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Peliculas favoritas
                        </th>
                        <td> <?php echo $aPeliculas[0]; ?><br>
                            <?php echo $aPeliculas[1]; ?> <br>
                            <?php echo $aPeliculas[2]; ?>

                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </main>

</body>

</html>