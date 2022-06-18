<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//para que se vea en la pantalla lo que esta guardado de antes
if (file_exists("archivo.txt")) {
    $strJson = file_get_contents("archivo.txt"); //variable distinta a la que esta mas abajo
    $aTareas = json_decode($strJson, true);
} else{
    $aTareas = array ();
}


//para obtener el id
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}


if ($_POST) {
    $asunto = $_POST["txtAsunto"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuarios"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];

    if ($id >= 0) {
        // estoy editando
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "asunto" => $asunto,
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "identificacion" => $id,
            "descripcion"=> $descripcion
        );
    } else {
        //estoy agregando nuevo
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "asunto" => $asunto,
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "identificacion" => $id,
            "descripcion"=> $descripcion
        );
    }

    //convertir el array  en json 
    $strJson = json_encode($aTareas);


    //almacenar en un archivo con flie_put_contents
    file_put_contents("archivo.txt", $strJson);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="CSS/estilos.css">

</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" class="form">
                    <div>
                        <label for="txtAsunto">Asunto</label>
                        <input type="text" name="txtAsunto" id="txtAsunto" class="form-control" required value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["asunto"] : ""; ?>">
                    </div>
                    <div>
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : "" ?>>Alta</option>
                            <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media" ? "selected" : "" ?>>Media</option>
                            <option value="Baja" <?php echo isset($aTareas[$id]) &&  $aTareas[$id]["prioridad"] == "Baja" ? "selected" : "" ?>>Baja</option>
                        </select>
                    </div>
                    <div>
                        <label for="lstUsuarios">Usuarios</label>
                        <select name="lstUsuarios" id="lstUsuarios" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana" ? "selected" : "" ?>>Ana</option>
                            <option value="Matias" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Matias" ? "selected" : "" ?>>Matias</option>
                            <option value="Diego" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Diego" ? "selected" : "" ?>>Diego</option>
                        </select>
                    </div>
                    <div>
                        <label for="lstEstado">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="No_asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "No_asignado" ? "selected" : "" ?>>No asignado</option>
                            <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : "" ?>>Asignado</option>
                            <option value="Activo" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Activo" ? "selected" : "" ?>>Activo</option>
                            <option value="Realizado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Realizado" ? "selected" : "" ?>>Realizado</option>
                        </select>
                    </div>
                    <div>
                        <label for="txtDescripcion">Descripcion de tarea</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"> <?php echo isset($aTareas[$id]) ? $aTareas[$id]["descripcion"] : ""; ?></textarea>
                    </div>
                    <div>
                        <input type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary mt-4" value="Enviar">
                        <a href="index.php" class="btn btn-danger mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
            <?php if (count($aTareas)): ?>
                <div class="col-6">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de insercion</th>
                                <th>Asunto</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aTareas as $pos => $tarea) { ?>
                                <tr>
                                    <td> <?php echo $tarea["identificacion"]; ?></td>
                                    <td><?php echo $tarea["fecha"]; ?> </td>
                                    <td> <?php echo $tarea["asunto"]; ?></td>
                                    <td> <?php echo $tarea["prioridad"]; ?></td>
                                    <td> <?php echo $tarea["usuario"]; ?></td>
                                    <td> <?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-file-pen"></i></a>
                                    </td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>

            <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info" role="alert">Aun no hay tareas cargadas </div>
                    </div>
                </div>

            <?php  endif; ?>


        </div>

    </main>

</body>

</html>