<?php


    include 'data1.php';


$nombre1=$_POST['nombre'];
$apellido1=$_POST['apellido'];
$cedula1=$_POST['cedula'];
$carrera1=$_POST['carrera'];
$libro1=$_POST['nom_lib'];
$fecha_dado=$_POST['dado'];
$fecha_entrega=$_POST['entrega'];



$sql_insertar=mysqli_query($conexion,"INSERT INTO personas(nombre,apellido,cedula,carrera,libro_prestado,fecha_dado,fecha_entregado,entregado) VALUES('$nombre1','$apellido1','$cedula1','$carrera1','$libro1','$fecha_dado','$fecha_entrega','No')");


if($sql_insertar){
    
    header('Location: /proyecto-beta/estatus.php');

    
}else{
   
}

?>