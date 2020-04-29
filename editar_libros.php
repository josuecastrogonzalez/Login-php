<?php

//EDITAR LOS LIBROS

    include 'data1.php';

$id=$_POST['id'];
$libro=$_POST['libro'];
$autor=$_POST['autor'];
$ano=$_POST['ano'];
$genero=$_POST['genero'];
$comentario=$_POST['comentario'];


$sql_modificar=mysqli_query($conexion,"UPDATE libros SET nombre_libro='$libro',autor='$autor',ano='$ano',genero='$genero',comentario='$comentario' WHERE id_libro=$id");//MODIFICA LOS CAMPOS CON LA FUNCION QUERY




if($sql_modificar){
    header("Location: /proyecto-beta/libros.php");
}



?>