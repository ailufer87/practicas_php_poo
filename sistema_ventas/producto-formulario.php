<?php

include_once "config.php";
include_once "entidades/productos.php";
include_once "entidades/tipo_productos.php";


$producto = new Producto();
$producto->cargarFormulario($_REQUEST);


$pg = "Listado de productos";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {

        $nombreImagen = "";
        //Almacenamos la imagen en el servidor
        if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $nombreRandom = date("Ymdhmsi");
            $archivoTmp = $_FILES["imagen"]["tmp_name"];
            $nombreArchivo = $_FILES["imagen"]["name"];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $nombreImagen = "$nombreRandom.$extension";
            move_uploaded_file($archivoTmp, "files/$nombreImagen");
        }

        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $producto->actualizar();
        } else {
            //Es nuevo
            $producto->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";
    } else if (isset($_POST["btnBorrar"])) {
        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}


if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId();
}

include_once("header.php");

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Producto</h1>
    <?php if (isset($msg)) : ?>
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
            <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data" class="form">
            <div class="col-6 form-group">
                <label for="txtNombre">Nombre:</label>
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre ?>">
            </div>
            <div class="col-6 form-group">
                <label for="txtCantidad">Cantidad:</label>
                <input type="number" required class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad ?>" maxlength="11">
            </div>
            <div class="col-6 form-group">
                <label for="txtPrecio">Precio:</label>
                <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" required value="<?php echo $producto->precio ?>">
            </div>

            <div class="col-6 form-group">
                <label for="lstFk_idtipoproducto">Tipo producto:</label>
                <select class="form-control selectpicker" data-live-search="true" name="lstFk_idtipoproducto" id="lstFk_idtipoproducto" required>
                    <option value="" disabled selected>Seleccionar</option>

                    <?php $tipoProducto = new TipoProducto();
                    $aTipoProductos = $tipoProducto->obtenerTodos();  ?>


                    <?php foreach ($aTipoProductos as $tipoProducto) : ?>
                        <?php if ($tipoProducto->idtipoproducto == $producto->fk_idtipoproducto) : ?>
                            <option value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </select>

            </div>

            <div class="col-6 form-group">
                <label for="lstDescripcion">Descripcion:</label>
                <textarea type="text" class="form-control" name="lstDescripcion" id="lstDescripcion"> <?php echo $producto->descripcion ?> </textarea>

            </div>



            <div class="col-12 form-group">
                <p class=pt-3>Imagen: <input type="file" class="form-control-file" name="imagen" id="imagen" accept=".jpg , .jpeg , .png"></p>
                <p>Archivos admitidos: .jpg, .jpeg, .png</p>
            </div>
    </div>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once("footer.php"); ?>

<script>
    ClassicEditor
        .create(document.querySelector('#lstDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>