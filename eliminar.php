<?php

//ELIMINAR LOS LIBROS

    include 'data1.php';

$id=$_POST['id'];



$sql_eliminar=mysqli_query($conexion,"DELETE FROM libros WHERE id_libro=$id");//ELIMINA LOS CAMPOS CON LA FUNCION QUERY




if($sql_eliminar){
    
    
    header("Location: /proyecto-beta/libros.php");
}



?>