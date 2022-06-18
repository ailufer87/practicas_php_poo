<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting (E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros pares</title>
</head>
<body>
    
    <?php /*muestra del 1 al 100*/
        for ($i=1; $i<=100; $i++) {
               echo "$i <br>" ;
        }    
    ?>

    

    <?php /*muestra solo pares*/
    for ($i=2; $i<=100 ; $i+=2) {
        echo "$i <br>" ;
        }
    ?>

    
   

    <?php /*muestra solo pares hasta 60 inclusive*/
    for ($i=2; $i<=100 ; $i+=2) {
        echo "$i <br>" ;
        if ($i==60){
            break;
        }
    }
    ?>
   

   <?php
    /*no me salio asi para muestra solo pares
        for ($i=1; $i<=100 ; $i++) {
            echo ( $i %2 ==0? "$i <br>")
        }
    */

    /*no me salio asi para muestra solo pares hasta 60 inclusive
            for ($i=1; $i<=100 && $i%2==0; $i++) {
                    echo "$i <br>";
                    if($i==60){
                    break;
                }
        
              
    */
    ?>

</body>
</html>