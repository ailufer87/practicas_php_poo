<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aPacientes = array(
    array("DNI" => "33765012", "nombre" => "Ana Acuña", "edad" => "45", "peso" => "81.5"),
    array("DNI" => "23684569", "nombre" => "Gonzale Bustamante", "edad" => "66", "peso" => "79"),
    array("DNI" => "15684569", "nombre" => "Juan Iraola", "edad" => "28", "peso" => "79"),
    array("DNI" => "27684569", "nombre" => "Beatriz Ocampo", "edad" => "50", "peso" => "79"),
);


function contar($aArray){
    $total= 0; //debe estar afuera del bucle
    foreach ($aArray as $item){
        $total++;
    }
     return $total;
}

echo "el total de pacientes es: " . contar($aPacientes);

?>