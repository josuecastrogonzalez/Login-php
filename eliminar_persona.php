<?php

//ELIMINAR PERSONA

    include 'data1.php';

$id=$_POST['id'];



$query="DELETE FROM personas WHERE id_persona=$id";
$sql_eliminar=mysqli_query($conexion,$query);




if($sql_eliminar){
    header("Location: /proyecto-beta/estatus.php");
}



?>