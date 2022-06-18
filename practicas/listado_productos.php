<?php

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

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 ">
                <h1 class="text-center">Listado de productos</h1>
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
                        <tr>
                            <td>
                                <?php echo $aProductos[0]["nombre"] ?>
                            </td>
                            <td> <?php echo $aProductos[0]["marca"] ?>
                            </td>
                            <td><?php echo $aProductos[0]["modelo"] ?>
                            </td>
                            <td><?php 
                            if ($aProductos[0]["stock"] == 0){
                                echo "no hay stock";
                            }
                            if ($aProductos[0]["stock"] <= 10  && $aProductos[0]["stock"] != 0) {
                                echo "poco stock";
                            }
                            if ($aProductos [0]["stock"] >10 ) {
                                echo "hay stock";
                            } ?>
                            </td>
                            <td><?php echo $aProductos[0]["precio"] ?>
                            </td>
                            <td> <button class="btn btn-primary">Comprar</button>
                            </td>
                        </tr>
                        <tr>
                        <td>
                                <?php echo $aProductos[1]["nombre"] ?>
                            </td>
                            <td> <?php echo $aProductos[1]["marca"] ?>
                            </td>
                            <td><?php echo $aProductos[1]["modelo"] ?>
                            </td>
                            <td><?php 
                            if ($aProductos[1]["stock"] == 0){
                                echo "no hay stock";
                            } 
                            if ($aProductos[1]["stock"] <= 10 && $aProductos[1]["stock"] != 0) {
                                echo "poco stock";
                            } 
                            if ($aProductos [1]["stock"] >10 ) {
                                echo "hay stock";
                            } ?>
                            </td>
                            <td><?php echo $aProductos[1]["precio"] ?>
                            </td>
                            <td> <button class="btn btn-primary">Comprar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $aProductos[2]["nombre"] ?>
                            </td>
                            <td> <?php echo $aProductos[2]["marca"] ?>
                            </td>
                            <td><?php echo $aProductos[2]["modelo"] ?>
                            </td>
                            <td> 
                                <?php //ejemplo condicional con if ternario
                                echo ($aProductos [2]["stock"] == 0  ? "no hay stock"  : ($aProductos [2]["stock"] >10 ? "hay stock"  : "poco stock" ));
                                ?>
                            </td>
                            <td><?php echo $aProductos[2]["precio"] ?>
                            </td>
                            <td><button class="btn btn-primary">Comprar</button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>