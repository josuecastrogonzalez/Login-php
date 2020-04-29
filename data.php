<?php

$server ='localhost';
$username= 'root';
$password='';
$database='proyectophp';

try{
    
  $conn= new PDO("mysql:host=$server;dbname=$database;",$username,$password);;
    echo 'Conexion establecida';
 
    
}catch(Exception $e){//mensaje arrojado
    
    die('Connected failed: '.$e->getMessage());
    echo 'No se puede conectar';
    
}


?>