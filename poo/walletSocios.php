<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

//Definicion

class Tarjeta{
    private $nombreTitular;
    private $numero;
    private $fechaDesde;
    private $fechaVencimiento;
    private $cvv;
    private $tipo;
        const VISA = "VISA";
        const CABAL = "CABAL";
        const MASTERCARD = "MASTERCARD";
        const NARANJA = "NARANJA";
    

    public function __get($propiedad) {return $this->$propiedad;}
    public function __set($propiedad, $valor) {$this->$propiedad = $valor;}

    public function __construct($numero,$fechaVencimiento,$cvv, $tipo)
        {
            
            $this-> numero=$numero;
            $this-> fechaVencimiento=$fechaVencimiento;
            $this-> cvv=$cvv;
            $this-> tipo= $tipo;
        
        }

    public function imprimirTipoTarjeta(){
        echo "Opciones: " . "<br>";
        echo self::VISA . "<br>";
        echo self::CABAL . "<br>";
        echo self::MASTERCARD . "<br>";
        echo self::NARANJA . "<br>". "<br>". "<br>";
    }
}


abstract class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular){
        $this-> dni = $dni;
        $this-> nombre = $nombre;
        $this-> correo = $correo;
        $this-> celular = $celular;
    }

}

class Cliente extends Persona{
    private $aTarjetas;
    private $activo;
    private $fechaAlta;
    private $fechaBaja;
    
    public function __get($propiedad) {return $this->$propiedad;}
    public function __set($propiedad, $valor) {$this->$propiedad = $valor;}

    function __construct()
    {
        $this-> fechaAlta= date("d/m/y");
        $this-> aTarjetas = array ();
        $this-> activo = true;
    }

    public function agregarTarjeta($tarjeta){
        $this-> aTarjetas[] =$tarjeta;
    }

    public function imprimirListado(){

    }

    public function darDeBaja($fechaBaja){
        $this->activo= false;
        $this-> fechaBaja= $fechaBaja;
    }
}

//PROGRAMA

$cliente1= new Cliente();
$cliente1-> dni= "32829414";
$cliente1-> nombre= "Ailen";
$cliente1-> correo= "ailu.fer87@gmail.com";
$cliente1-> celular= "2213506283";
$tarjeta1= new Tarjeta (Tarjeta::CABAL, "484566784488","01/23", "345");
$tarjeta2= new Tarjeta ( Tarjeta::MASTERCARD, "112233445566", "10/24", "456");
$tarjeta3= new Tarjeta( Tarjeta::NARANJA, "887766554433", "12/24", "345");
$cliente1-> agregarTarjeta($tarjeta1);
$cliente1-> agregarTarjeta ($tarjeta2);
$cliente1-> agregarTarjeta($tarjeta3);

$cliente2= new Cliente();
$cliente2-> dni= "29159428";
$cliente2-> nombre= "Diego";
$cliente2-> correo= "diegomartin@gmail.com";
$cliente2-> celular= "2215630428";
$cliente2-> agregarTarjeta(new Tarjeta (Tarjeta::CABAL, "990066778899", "01/23", "345"));  //OTRA FORMA
$cliente2-> agregarTarjeta( new Tarjeta ( Tarjeta::MASTERCARD, "556677883344", "10/24", "456"));


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

</html>