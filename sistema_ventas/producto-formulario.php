<?php

include_once "config.php";
include_once "entidades/productos.php";
include_once "entidades/tipo_productos.php";


$producto = new Producto();
$producto->cargarFormulario($_REQUEST);


$pg = "Listado de productos";

if ($_POST) {
    
    if (isset($_POST["btnGuardar"])) {
               
        if (isset($_GET["id"]) && $_GET["id"] > 0) {

            $productoAux = new Producto();
            $productoAux->idproducto = $_GET["id"];
            $productoAux->obtenerPorId();


            if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {

                
                

            //Si es una actualizacion y se sube una imagen, elimina la anterior
                if(file_exists("files/$productoAux->imagen")){
                unlink("files/$productoAux->imagen"); }

            $nombreRandom = date("Ymdhmsi");
            $archivoTmp = $_FILES["imagen"]["tmp_name"];
            $nombreArchivo = $_FILES["imagen"]["name"];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
            $nombreImagen = "$nombreRandom.$extension";
            move_uploaded_file($archivoTmp, "files/$nombreImagen");
            $producto -> imagen= $nombreImagen;
            }
            }
            else {
                //Si no viene ninguna imagen, setea como imagen la que habia previamente
                $producto->imagen= $productoAux->imagen;
            }

            
            //Actualizo un cliente existente
            $producto->actualizar();
            
    
        } else {
    
            //Es nuevo   
            $nombreImagen = "";
        //Almacenamos la imagen en el servidor
        if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $nombreRandom = date("Ymdhmsi");
            $archivoTmp = $_FILES["imagen"]["tmp_name"];
            $nombreArchivo = $_FILES["imagen"]["name"];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $nombreImagen = "$nombreRandom.$extension";
                move_uploaded_file($archivoTmp, "files/$nombreImagen");
                $producto -> imagen= $nombreImagen;               
            }
        }
        
        $producto->insertar();          
    }

        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";
    
    }
     else if (isset($_POST["btnBorrar"])) {
        $productoAux = new Producto();
        $productoAux->idproducto = $_GET["id"];
        $productoAux->obtenerPorId();

        if(file_exists("files/$productoAux->imagen")){
            unlink("files/$productoAux->imagen"); 
        }

        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId();

}


$tipoProducto = new Tipoproducto();
$aTipoProductos = $tipoProducto->obtenerTodos();

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
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
            </div>                                                                                  
            <div class="col-6 form-group">
                <label for="txtCantidad">Cantidad:</label>
                <input type="number" required class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>" maxlength="11">
            </div>
            <div class="col-6 form-group">
                <label for="txtPrecio">Precio:</label>
                <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" required value="<?php echo $producto->precio; ?>">
            </div>

            <div class="col-6 form-group">
                <label for="lstFk_idtipoproducto">Tipo producto:</label>
                <select class="form-control selectpicker" data-live-search="true" name="lstFk_idtipoproducto" id="lstFk_idtipoproducto" required>
                    <option value="" disabled selected>Seleccionar</option>

                    <?php $tipoProducto = new TipoProducto();
                    $aTipoProductos = $tipoProducto->obtenerTodos();  ?>


                    <?php foreach ($aTipoProductos as $tipoProducto) : ?>
                        <?php if ($tipoProducto->idtipoproducto == $producto->fk_idtipoproducto) : ?>
                            <option selected value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </select>

            </div>

            <div class="col-6 form-group">
                <label for="txtDescripcion">Descripcion:</label>
                <textarea type="text" class="form-control" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion;?></textarea>

            </div>



            <div class="col-12 form-group">
                    <label for="fileImagen">Imagen:</label>
                    <input type="file" class="form-control-file" name="imagen" id="imagen">
                    <img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail">
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

