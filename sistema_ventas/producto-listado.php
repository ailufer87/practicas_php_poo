<?php

include_once "config.php";
include_once "entidades/productos.php";
$pg = "Listado de productos";

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once("header.php"); 
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de productos</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Nombre</th>
                <th>cantidad</th>
                <th>precio</th>
                <th>descripcion</th>
                <th>imagen</th>
                <th>tipo producto</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($aProductos as $producto): ?>
              <tr>
                  <td><?php echo $producto->nombre; ?></td>
                  <td><?php echo $producto->cantidad; ?></td>
                  <td><?php echo $producto->precio; ?></td>
                  <td><?php echo $producto->descripcion; ?></td>
                  <td><?php echo $producto->imagen; ?></td>
                  <td><?php echo $producto->fk_idtipoproducto; ?></td>
                  <td style="width: 110px;">
                      <a href="producto-formulario.php?id=<?php echo $producto->idproducto; ?>"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once("footer.php"); ?>