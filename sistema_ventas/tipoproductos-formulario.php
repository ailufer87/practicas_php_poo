<?php

include_once "config.php";
include_once "entidades/tipo_productos.php";

$tipoProducto = new TipoProducto();
$tipoProducto->cargarFormulario($_REQUEST);

$pg = "Listado de tipo de productos";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un tipoProducto existente
            $tipoProducto->actualizar();
        } else {
            //Es nuevo
            $tipoProducto->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $tipoProducto->eliminar();
        header("Location: tipoproducto-listado.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0){
$tipoProducto->obtenerPorId();
}

include_once "header.php";

?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Tipo de productos</h1>
          <?php if(isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="tipoproducto-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="tipoproductos-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $tipoProducto->nombre; ?>">
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include_once("footer.php"); ?>