<?php


    include 'data1.php';

$id_estudiante=$_POST['id_estudiante'];
$id_libro1=$_POST['nom_lib'];
$fecha_solicitud1=$_POST['fecha_solicitud'];
$libros=$_POST['nom_lib'];
$fecha_dado=$_POST['dado'];
$fecha_entrega=$_POST['entrega'];



$sql_insertar=mysqli_query($conexion,"INSERT INTO solicitud(id_libro,id_estudiante,fecha_recibe,fecha_entrega,estatus_solicitud,fecha_solicitud) VALUES('$id_libro1','$id_estudiante','$fecha_dado','$fecha_entrega','Pendiente','$fecha_solicitud1')");


if($sql_insertar){
    
    header('Location: /proyecto-beta/profile_estudiante.php');

    
}else{
    echo 'no se pudo solicitar';
   
}

?>