<?php


try{
    
     define("HOST_DB", "localhost");
    define("USER_DB", "root");
    define("PASS_DB", "");
    define("NAME_BD", "proyectophp");


    $conexion = new mysqli(
    
        constant("HOST_DB"),
        constant("USER_DB"),
        constant("PASS_DB"),
        constant("NAME_BD")

    );

    
    
}catch(Exepcion $e){
    
     die('Connected failed: '.$e->getMessage());
    echo 'No se puede conectar';
    
}
   




?>