<?php

use Docente as GlobalDocente;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
        protected $dni;
        protected $nombre;
        protected $edad;
        protected $nacionalidad;

        public function setDni($dni){$this->dni=$dni;}
        public function getDni(){ return $this->dni;}

        public function setNombre($nombre){$this->nombre=$nombre;}
        public function getNombre(){return $this->nombre;}

        public function setEdad($edad){ $this->edad=$edad;}
        public function getEdad(){return $this->edad;}

        public function setNacionalidad($nacionalidad){$this->nacionalidad=$nacionalidad;}
        public function getNacionalidad(){return $this->nacionalidad;}


        public function imprimir(){
               
        }

}

class Alumno extends Persona {
        private $legajo;
        private $notaPortfolio ;
        private $notaPhp;
        private $notaProyecto;

        public function __construct($dni="", $nombre="")
        {       
                $this->dni= $dni;
                $this->nombre=$nombre;
                $this->notaPortfolio = 0.0;
                $this->notaPhp =0.0;
                $this->notaProyecto = 0.0;
                
        }

        public function __destruct()
        {
             echo "destruyendo el objeto: " .  $this->nombre . "<br>";
        }

        public function __get($propiedad) {return $this->$propiedad;}
        public function __set($propiedad, $valor) {$this->$propiedad = $valor;}
        

        public function imprimir(){
                echo "El alumno: " . $this->nombre . "<br>";
                echo "Documento: " . $this->dni . "<br>";
                echo "Nota portfolio: " . $this->notaPortfolio ."<br>"."<br>"."<br>";
        }
        public function calcularPromedio(){

        }
}


class Docente extends Persona {
        private $especialidad;
                const ESPECIALIDAD_WP = "Wordpress";
                const ESPECIALIDAD_ECO = "Economía aplicada";
                const ESPECIALIDAD_BBDD = "Base de datos";


        public function __destruct()
                {
                     echo "destruyendo el objeto: " .  $this->nombre . "<br>";
                }

        public function __set($propiedad, $valor) { $this->$propiedad = $valor;}
        public function __get($propiedad) {return $this->$propiedad;}
        
                
         public function imprimir(){
                echo "El docente: " . $this->nombre . "<br>";
                echo "Documento: " . $this->dni . "<br>";
                echo "Especialidad: " . $this->especialidad ."<br>". "<br>". "<br>";

         }
         public function imprimirEspecialidadesHabilitadas(){
                 echo "Especialidades: " . "<br>";
                 echo self::ESPECIALIDAD_BBDD . "<br>";
                 echo self::ESPECIALIDAD_ECO . "<br>";
                 echo self::ESPECIALIDAD_WP . "<br>". "<br>". "<br>";

         }


}

//programa

$alumno1= new Alumno("32829414","Ailen");
$alumno1->edad= "34";
$alumno1->nacionalidad= "Argenina";
$alumno1->notaPhp=7;
$alumno1->notaPortfolio= 8;
$alumno1->notaProyecto= 9;
$alumno1->imprimir();

$alumno2= new Alumno();
$alumno2->setNombre("Diego");
$alumno2->setDni("29159428");
$alumno2->setEdad ("40");
$alumno2->setnacionalidad("Argenina");
echo $alumno2-> getNombre();
$alumno2->notaPhp=9;
$alumno2->notaPortfolio= 8;
$alumno2->notaProyecto= 10;
$alumno2->imprimir();

$docente1= new Docente();
$docente1->nombre= "Martin Castro";
$docente1->dni="23456789";
$docente1->edad="47";
$docente1->nacionalidad="Argentina";
$docente1->especialidad= Docente::ESPECIALIDAD_ECO;
$docente1->imprimir();
$docente1->imprimirEspecialidadesHabilitadas ();

?>