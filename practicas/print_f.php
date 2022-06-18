<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//definicion
$aNotas= array (7,6,5,4,3);
$mensaje= "este es un mensaje";
//OPCION 1
function print_f ($variable){
    $contenido="";
    //$contenido= file_get_contents("datos.txt");
    if (is_array($variable)){ //si es array lo recorro y guardo el contenido en el archivo datos.txt
        
        foreach ($variable as $item){
            
           $contenido.= $item;
        }
            file_put_contents("datos.txt", $contenido);
    } 
    
    else{ //si es string, guardo el contenido en el archivo datos.txt
        file_put_contents("datos.txt", $variable); //esta funcion sobre escribe el contenido del archivo

    }
}

//OPCION 2

function print_f2 ($variable){
    if (is_array($variable)){
        $archivo1= fopen ("datos.txt", "a");
        foreach ($variable as $item){
            fwrite($archivo1, $item);
        }
        fclose($archivo1);
    }else{ //si es string, guardo el contenido en el archivo datos.txt
            file_put_contents("datos.txt", $variable); //esta funcion sobre escribe el contenido del archivo
    
        }
    }

//uso

echo print_f($aNotas);

?>