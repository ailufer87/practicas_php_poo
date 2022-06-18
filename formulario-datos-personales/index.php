<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    <main class=container>
        <div class="row">
            <div class="col-12 py-4 text-center">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="offset-sm-3 col-sm-6 col-12"> <!-- para table en adelante lo pone en el medio con offset, ocupando 6 columnas, para celu ocupa 12 columnas-->
                <form action="resultado.php" method="POST"> <!--para vincular con pagina resultado-->
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" name="txtName" id="txtName" class="form-control" required >
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtTel">Telefono:*</label>
                        <input type="text" name="txtTel" id="txtTel" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:*</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control" required>
                    </div>
                    <div>
                        <button type="submit" class= " my-3 btn btn-primary float-end" >Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main> 
</body>


                    