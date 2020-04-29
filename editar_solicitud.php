<?php

//EDITAR LOS LIBROS

    include 'data1.php';

$id=$_POST['id'];
$estado_solicitud=$_POST['estatus_solicitud'];


$sql_modificar=mysqli_query($conexion,"UPDATE solicitud SET estatus_solicitud='$estado_solicitud' WHERE id_solicitud=$id");//MODIFICA LOS CAMPOS CON LA FUNCION QUERY




if($sql_modificar){
    header("Location: /proyecto-beta/solicitudesdepersonas.php");
}



?>