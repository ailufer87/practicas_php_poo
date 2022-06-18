<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();



if (!isset ($_SESSION ["listadoClientes"])){
    $_SESSION ["listadoClientes"]= array();
}

if ($_POST){

    if (isset($_POST["btnAgregar"])){

    
    $nombre= $_POST ["txtNombre"];
    $dni= $_POST ["txtDNI"];
    $telefono= $_POST ["txtTel"];
    $edad= $_POST ["txtEdad"];


    $cliente= array( "nombre"=> $nombre,
                "DNI"=> $dni,
                "Tel"=>$telefono,
                "Edad"=> $edad);


    $_SESSION ["listadoClientes"] []= $cliente;
}
    else if (isset($_POST["btnEliminar"])){
        session_destroy();
        header("Location:http://localhost/php/clientes_session.php");
    }
      
}



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
            <div class="col-12 text-center p-4">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <form action="" method="POST" class="form">
                        <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ingrese el nombre y apellido">
                        </div>
                        <div>
                            <label for="txtDNI">DNI:</label>
                            <input type="text" name="txtDNI" id="txtDNI" class="form-control">
                        </div>
                        <div>
                            <label for="txtTel">Telefono</label>
                            <input type="tel" name="txtTel" id="txtTel" class="form-control">
                        </div>
                        <div>
                            <label for="txtEdad">Edad</label>
                            <input type="text" name="txtEdad" id="txtEdad" class="form-control">
                        </div>
                    
                    <div>
                        <button type="submit" name="btnAgregar" class="btn btn-primary mt-3">Enviar</button>
                        <button type="submit" name="btnEliminar" class="btn btn-danger mt-3">Eliminar</button>
                    </div>
                </form>
            </div>

            <div class="col-7">
                
                <table class="table table-hover border">
                    <thead>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION["listadoClientes"] as $cliente){ ?>
                            <td> <?php echo $cliente["nombre"]; ?> </td>
                            <td> <?php echo $cliente["DNI"];?> </td>
                            <td> <?php echo $cliente["Tel"];?> </td>
                            <td> <?php echo $cliente["Edad"];?> </td>
                        <?php };  ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>
