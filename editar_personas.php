<?php

//EDITAR PERSONA

    include 'data1.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cedula=$_POST['cedula'];
$carrera=$_POST['carrera'];
$libro=$_POST['nom_lib'];
$f_dado=$_POST['dado'];
$f_entregado=$_POST['entrega'];
$entregado=$_POST['entregado'];


$query="UPDATE personas SET nombre='$nombre',apellido='$apellido',cedula='$cedula',carrera='$carrera',libro_prestado='$libro',fecha_dado='$f_dado',fecha_entregado='$f_entregado',entregado='$entregado' WHERE id_personas=$id";//MODIFICA LOS CAMPOS CON LA FUNCION QUERY
$sql_modificar=mysqli_query($conexion,$query);




if($sql_modificar){
    header("Location: /proyecto-beta/estatus.php");
}



?>