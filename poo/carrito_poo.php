<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definicion

class Cliente {
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __get($propiedad) {return $this->$propiedad;}
    public function __set($propiedad, $valor) {$this->$propiedad = $valor;}
        

    public function __construct()
    {
        $this->descuento=0.0;
    }

    public function imprimir(){
        echo "el dni es:" . $this->dni . "<br>";
        echo "nombre: " . $this->nombre . "<br>";
        echo "correo: " . $this->correo . "<br>";
        echo "telefono: " . $this->telefono . "<br>";
        echo "descuento: " . $this-> descuento . "<br>". "<br>". "<br>";
    }
}


class Producto{
    private $codigo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $iva;

    public function __get($propiedad) {return $this->$propiedad;}
    public function __set($propiedad, $valor) {$this->$propiedad = $valor;}

    public function __construct()
    {
        $this->precio =0.0;
        $this-> iva = 0.0;
    }

    public function imprimir(){
        echo "el codigo es:" . $this->codigo . "<br>";
        echo "nombre: " . $this->nombre . "<br>";
        echo "descripcion: " . $this->descripcion . "<br>";
        echo "precio: " . $this->precio . "<br>";
        echo "iva: " . $this-> iva . "<br>". "<br>". "<br>";
    }

}


class Carrito {
    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __get($propiedad) {return $this->$propiedad;}
    public function __set($propiedad, $valor) {$this->$propiedad = $valor;}

    public function __construct()
    {
        $this->aProductos = array();
        $this->subTotal =0.0;
        $this->total= 0.0;
    }

    public function cargarProducto($producto){
        $this->aProductos[] = $producto;
    }

    public function imprimirTicket(){
        echo "<table class= table table-hover border>";
        echo "<tr> <th class= 'text center'> ECO MARKET </th></tr>
            <tr> 
            <th> Fecha </th> <td>" . Date ("d/m/Y "). "</td>
            </tr>
            <th> DNI </th> <td>". $this->cliente->dni . "</td>
            </tr>
            <tr>
            <th>Nombre</th> <td>". $this->cliente->nombre . "</td>
            </tr>
            <tr>
            <th>Productos</th>
            </tr>
            <td>";
             foreach ($this-> aProductos as $producto ) {
                echo "<tr>
                            <td>" . $producto->nombre . "</td>
                            <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                     </tr>";
                     $this->subTotal += $producto->precio;
                     $this->total += $producto->precio * (($producto->iva / 100)+1);
                   
            }
            echo "<tr>
                <th>Subtotal s/IVA:</th>
                <td>$ " . number_format($this->subTotal, 2, ",", ".") . "</td>
              </tr>
            <tr>
                <th>TOTAL:</th>
                <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
              </tr>
        </table>";
  
    }

}


//Programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto1->iva = 10.5;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;   //lo asocia al cliente1
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </div>
</body>
</html>