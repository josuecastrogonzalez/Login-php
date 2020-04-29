<?php

    require_once 'data1.php';



    $sql_leer='SELECT * FROM users';

    $guardar=$conexion->query($sql_leer);
   

    $guardar=mysqli_fetch_array($guardar);


    if(!=$guardar){
       
        echo 'no ha pasado nada';   
    
        
    }else{
      
        
    }

    



 
        
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hola</title>
</head>
<body>
    
   
    
 
</body>
</html>