<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inciar Sesion</title>
    <script src="function.js"></script>
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="stylesheet" href="css/themes/default.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/alertify.js"></script>
        <link rel="shortcut icon" href="libro3.jpg" />

    
</head>
<body>
     <div class="contenedor-imagen">
      <img src="biblioteca.jpg" alt="">
  </div>
   
   <div class="contenedor-formulario">
   <h1 class="inicio">Inciar Sesión</h1>
    <form action="login.php" method="post">
        
        <input type="text" name="email" placeholder="Correo o Usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar Sesión" id="btn-login" name="submit" class="btn btn-primary">
        
        
         <div class="registrarse-cuenta">
    <a href=signup.php class="olvido">Registrarse</a>
       </div>
    </form>
    </div>
    
   
   
   
   <?php

session_start();
    
if(!empty($_SESSION['admin'])){
     
    header("Location: /proyecto-beta/profile_admin.php");
    
}if(!empty($_SESSION['estudiante'])){
    
    header("Location: /proyecto-beta/profile_estudiante.php");
}else{

    require 'data1.php';
    require 'funcs.php';
    


    if(isset($_POST['submit'])){
        if(!empty($_POST['password']) && !empty($_POST['email'])){
            
            
            $email=$_POST['email'];
            $pass=$_POST['password'];
           
            
           
        $query="SELECT * FROM users WHERE email='$email' AND password='$pass'";//prepara
        $consulta=mysqli_query($conexion,$query);//consulta a la base de datos
        $result=mysqli_num_rows($consulta);//guarda en un result el num 1 o 0
            
        
            if($result >0){//si es mayor a uno quiere decir que hay uno encontrado por lo cual inicia sesion
            
               
                
               $array=mysqli_fetch_array($consulta);//guarda en un array la consulta-!usuario!-
                
                
                $_SESSION['id']=$array['id'];
                $_SESSION['name']=$array['name'];
                $_SESSION['usuario']=$array['usuario'];
                $_SESSION['email']=$array['email'];
                $_SESSION['cedula']=$array['cedula'];
                $_SESSION['genero']=$array['genero'];
                $_SESSION['c_password']=$array['password'];
                $_SESSION['rol']=$array['rol'];
                
                if($array['rol']==1){
                    
                    session_start();

                header("Location: /proyecto-beta/profile_admin.php");
                    
                    $_SESSION['admin']= true;
                    
                }else{
                    session_start();
                    
                    header("Location: /proyecto-beta/profile_estudiante.php");
                    
                    $_SESSION['estudiante']= true;
                }
                
            }else{
                echo "<script>$(function(){alertify.alert('Usuario o Contraseña incorrecto');})</script>";
            }
          
            
            }else{
           
           echo "<script>$(function(){alertify.alert('Llene todos los campos');})</script>";
        
            }  
    }
}

?>
 
</body>
</html>