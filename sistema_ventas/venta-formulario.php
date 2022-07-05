<?php

include_once "config.php";
include_once "entidades/ventas.php";
include_once "entidades/productos.php";
include_once "entidades/cliente.php";

$venta = new Venta();
$venta->cargarFormulario($_REQUEST);

$pg = "Formulario de ventas";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $venta->actualizar();
        } else {
            //Es nuevo
            
            $producto = new Producto();
            $producto->idproducto = $venta->fk_idproducto;
            $producto->obtenerPorId();

            if($venta->cantidad <= $producto->cantidad){
                $total = $venta->cantidad * $producto->precio;
                $venta->total = $total;
                $venta->insertar();

                $producto->cantidad -= $venta->cantidad;
                $producto->actualizar();

                $msg["texto"] = "Guardado correctamente";
                $msg["codigo"] = "alert-success";

            } else {
                $msg["texto"] = "No hay stock suficiente";
            }
        }

    } else if (isset($_POST["btnBorrar"])) {

        $venta->eliminar();
        header("Location: venta-formulario.php");
    }
}


if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $venta->obtenerPorId();
}




include_once("header.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Formulario de ventas</h1>
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
            <a href="venta-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="lstFk_idcliente">Cliente:</label>
            <select class="form-control selectpicker" data-live-search="true" name="lstFk_idcliente" id="lstFk_idcliente" required>
                <option value="" disabled selected>Seleccionar</option>

                <?php $cliente = new Cliente();
                $aClientes = $cliente->obtenerTodos();  ?>


                <?php foreach ($aClientes as $cliente) : ?>
                    <?php if ($cliente->idcliente == $cliente->fk_idcliente) : ?>
                        <option selected value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-6 form-group">
            <label for="lstFk_idproducto">Producto:</label>

            <select class="form-control selectpicker" data-live-search="true" name="lstFk_idproducto" id="lstFk_idproducto" required>
                <option value="" disabled selected>Seleccionar</option>

                <?php $producto = new Producto();
                $aProductos = $producto->obtenerTodos();  ?>

                <?php foreach ($aProductos as $producto) : ?>
                    <?php if ($producto->idproducto == $producto->lstFk_idproducto) : ?>
                        <option selected value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="txtPreciounitario">Precio:</label>
            <input type="" class="form-control" name="txtPreciounitario" id="txtPreciounitarioo" required value="<?php echo $venta->preciounitario ?>">
        </div>

        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="number" required class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $venta->cantidad ?>" maxlength="11">
        </div>





       
        <div class="col-6 form-group">
            <label for="txtFechaNac" class="d-block">Fecha y hora:</label>
            <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                <option selected="" disabled="">DD</option>
                <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <?php if ($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "d")) : ?>
                        <option selected><?php echo $i; ?></option>
                    <?php else : ?>
                        <option><?php echo $i; ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
            <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                <option selected="" disabled="">MM</option>
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <?php if ($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "m")) : ?>
                        <option selected><?php echo $i; ?></option>
                    <?php else : ?>
                        <option><?php echo $i; ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
            <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                <option selected="" disabled="">YYYY</option>
                <?php for ($i = 1900; $i <= date("Y"); $i++) : ?>
                    <?php if ($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "Y")) : ?>
                        <option selected><?php echo $i; ?></option>
                    <?php else : ?>
                        <option><?php echo $i; ?></option>
                    <?php endif; ?>
                <?php endfor; ?> ?>
            </select>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once("footer.php"); ?>