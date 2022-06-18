<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mensaje="";

//trim sirve para eliminar espacios en lo que se postee

if ($_POST) {

    if (file_exists("invitados.txt")) {
        $aInvitados = explode(",", file_get_contents("invitados.txt"));
    } else {
        $aInvitados = array();
    }


    if (isset($_POST["btnProcesar"])) {
        $dni = $_POST["txtDni"];
        if (in_array($dni, $aInvitados)) {
            $mensaje="Bienvenid@ a la fiesta!";
            $alerta= "success";

        } else {
            $mensaje= "Usted no se encuentra en la lista de invitados";
            $alerta= "danger";
        }
    }

    if (isset($_POST["btnVip"])) {
        $vip = $_POST["txtVip"];
        if ($vip == "verde") {
            $mensaje="Su codigo de acceso VIP es:" . " " . rand(0000,9999) ;
            $alerta= "success";
        } else {
            $mensaje= "Usted no es invitado VIP!";
            $alerta= "danger";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <?php if ($mensaje !=""): ?>
            <div class="alert alert-<?php echo $alerta ?>" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>


        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-5">Lista de invitados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Complete el siguiente formulario</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" class="form">
                    <div>
                        <label for="txtDni">Ingrese DNI</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                        <input type="submit" name="btnProcesar" id="btnProcesar" class="btn btn-primary mt-3 form-control" value="Verificar invitado">
                    </div>
                    <div>
                        <label for="txtVip">Ingrese codigo VIP</label>
                        <input type="text" name="txtVip" id="txtVip" class="form-control">
                        <input type="submit" name="btnVip" id="btnVip" class="btn btn-primary form-control mt-3" value="Verificar codigo">
                    </div>
                </form>
                <div>
                    <a href="formulario_invitados.php"  class="btn btn-danger mt-3">Nuevo </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>