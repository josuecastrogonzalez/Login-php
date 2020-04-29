<?php
session_start();



if(!empty($_SESSION['active'])){
     
    header("Location: /proyecto-beta/profile.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <script src="function.js"></script>
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="stylesheet" href="css/themes/default.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/estilos.css">
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="libro3.jpg" />
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/alertify.js"></script>
</head>
<body>
  <div class="contenedor-imagen">
      <img src="biblioteca.jpg" alt="">
  </div>
   <div class="contenedor-formulario">
  
    <form action="signup.php" method="post" onsubmit="return validar(this);">
         <h1>¡Registrate!</h1>
         
         
         <input type="text" name="name" placeholder="Nombre" >
      

        <input type="text" name="cedula" placeholder="Cedula" > 
        
        <input type="email" name="email" placeholder="Correo" >
       
        <input type="password" name="password" placeholder="Contraseña" > 
        
        <input type="password" name="c_pass" placeholder="Confirmar contraseña">
        
        <div class="contenedor-radio">
        <input type="radio" name="sexo" id="hombre" value="Hombre">
        <label for="hombre" class="hombre">Hombre</label>
        
        <input type="radio" name="sexo" id="mujer" value="Mujer">
        <label for="mujer" class="mujer">Mujer</label>
        </div>
        

         
        <input type="submit" name="submit" class="btn btn-primary" value="Crear Cuenta">
        
        
        
    </form>
    
    <div class="tienes-cuenta">
    <label id="etiqueta">¿Ya tienes cuenta? </label>
    <a href=login.php>Iniciar Sesión</a>
       </div>
    </div>
      
      
       <?php

require 'data1.php';
require 'funcs.php';



if(isset($_POST['submit'])){
    
    
if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['c_pass'])  && !empty($_POST['name']) && !empty($_POST['sexo']) && !empty($_POST['cedula'])){

    
    $email=$_POST['email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_pass'];
    $name=$_POST['name'];
    $sexo=$_POST['sexo'];
    $cedula=$_POST['cedula'];
    
    if(validarEmail($email)){
        
       echo "<script>$(function(){alertify.error('Ya existe el email, intente de nuevo');})</script>";
        
      
        }else{
        
    if(validarPassword($password,$c_password)){  
        
    
            
   
        
     if(registrarUsuario($name,$email,$password,$sexo,$cedula)){
         
       echo "<script>$(function(){alertify.success('Se ha registrado correctamente');})</script>";
         
     }else{
        echo "<script>$(function(){alertify.alert('No pudo registrarse');})</script>";
         
     }
        }else{
      echo "<script>$(function(){alertify.error('La contraseña no coinciden');})</script>";
    }
    
    
    }
    
}else{
    echo "<script>$(function(){alertify.alert('Llene todos los campos');})</script>";
}
    

  


}

?>
    
</body>

</html>