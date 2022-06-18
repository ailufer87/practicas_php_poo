<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularAreaRect($base,$altura){
    $sup=$base*$altura;
    return $sup;
}

echo "el area es " . calcularAreaRect(100,0.60) ;
?>