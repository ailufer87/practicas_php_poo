<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UDH",
    "marca" => "Hitachi",
    "modelo" => "554K",
    "stock" => 60,
    "precio" => 58000
);

$aProductos[] = array(
    "nombre" => "Samsumg Galaxy A30",
    "marca" => "Samsumg",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);

$aProductos[] = array(
    "nombre" => "Aire acondicionado",
    "marca" => "Surrey",
    "modelo" => "553AI",
    "stock" => 5,
    "precio" => 45000
);

$aProductos[] = array(
    "nombre" => "Impresora HP laser",
    "marca" => "HP",
    "modelo" => "P1102W",
    "stock" => 11,
    "precio" => 20000
);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sumar total</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 ">
                <h1 class="text-center">Listado de productos con bucle</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">

                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo </th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $contador = 0;
                        $subtotal = 0;
                        while ($contador < 4) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $aProductos[$contador]["nombre"] ?>
                                </td>
                                <td> <?php echo $aProductos[$contador]["marca"] ?>
                                </td>
                                <td><?php echo $aProductos[$contador]["modelo"] ?>
                                </td>
                                <td>
                                    <?php // condicional con if ternario
                                    echo ($aProductos[$contador]["stock"] == 0  ? "no hay stock"  : ($aProductos[$contador]["stock"] > 10 ? "hay stock"  : "poco stock"));
                                    ?>
                                </td>
                                <td><?php echo $aProductos[$contador]["precio"] ?>
                                </td>
                                <td><button class="btn btn-primary">Comprar</button>
                                </td>
                            </tr>
                        <?php

                            $subtotal = $subtotal + $aProductos[$contador]["precio"];
                            $contador++;
                        }
                        ?>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-12">

                        <h3>El subtotal es: $ <?php echo "$subtotal" ?> </h3>


                    </div>
                </div>
            </div>
        </div>
    </main>
</body>




</html>