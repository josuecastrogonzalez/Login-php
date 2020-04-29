
<?php

include 'data1.php';
include 'functions.php';

session_start();
   if(empty($_SESSION['admin'])){
    
     header("Location: /proyecto-beta/profile_estudiante.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Personas</title>
        
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
     <?php    include "scripts.php";?>
     
</head>
<body>
    <div class="contenedor-header">
   <header> 
     <h1> <a href="/proyecto-beta/profile.php" class="biblioteca">Biblioteca</a></h1>
     <p id="venezuela">Venezuela, <?php   echo fecha();?></p>
     <div class="contenedor-span">
     <span class="label">Email:</span>
     <span class="user"><?php echo $_SESSION['email'];?></span>
     </div>
    <li><a href="logout.php" class="cerrar">Cerrar Sesión</a></li> 
     
    
    
   </header>
   
 </div>  
   
<div class="container-fluid navbar navbar-light " style="background-color: #38FF90;">

<nav class="navbar navbar-expand-lg  container">
  <a href="/proyecto-beta/profile.php" id="nivel"><i class="fas fa-book"></i></a>
      <label id="nivel"><?php echo $_SESSION['usuario']?></label>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" id="myTab">
    <div class="navbar-nav ml-auto" >
      <a class="nav-item nav-link" href="/proyecto-beta/profile_admin.php">Inicio</a>
      <a class="nav-item nav-link" href="/proyecto-beta/registrarlibros.php">Ingresar Libros</a>
      <a class="nav-item nav-link" href="/proyecto-beta/libros.php">Ver Libros</a>
       <a class="nav-item nav-link" href="/proyecto-beta/prestario.php">Ingresar Personas</a>
        <a class="nav-item nav-link" href="/proyecto-beta/estatus.php">Estatus</a>
        <a class="nav-item nav-link" href="/proyecto-beta/solicitudesdepersonas.php">Solicitudes de Estudiantes</a>
      
      
    </div>
  </div>
</nav>
</div>


<style>

#nivel{
    font-size: 20px;
    color: black;
    margin-left: 8px;
   
}


</style>
    <hr>
<div class="contenedor-formulario">
    
             <h2 class="registro-libros">Ingresar Personas</h2>
    

         <form action="insertarpersonas.php" method="post" class="formulario">
         
         <div class="input-group">
         <label for="" class="etiqueta">Nombre de la persona</label>
         <input type="text" name="nombre"  class="input-libro">
         </div>
         
        <div class="input-group">
         <label for="" class="etiqueta">Apellido de la persona</label>
         <input type="text" name="apellido" class="input-libro">
         </div>
         
          <div class="input-group">
          <label for="" class="etiqueta">Cedula de identidad</label>
          <input type="text" id="cedula" name="cedula" class="input-libro">
          </div>
          
          
             
             <div class="input-group">
          <label for="" class="etiqueta">Carrera</label>   
          <select name="carrera" id="carrera">
            
              <option value="Ing en Computación">Ing en Computación</option>
              <option value="Ing en Sistemas">Ing en Sistemas</option>
              <option value="Ing en Quimica">Ing en Quimica</option>
              <option value="Recursos Humanos">Recursos Humanos</option>
              <option value="Contaduria">Contaduria</option>
              <option value="Comunicación Social">Comunicación Social</option>
              <option value="Derechos">Derechos</option>
              <option value="Diseño Grafico">Diseño Grafico</option>
          </select>
             </div>
              <div class="contenedor-input">
          <label for="" class="etiqueta">Libros</label>   
          <select name="nom_lib" id="">
             
              <?php
              $sql_consulta=mysqli_query($conexion,"SELECT nombre_libro FROM libros");
             $result=mysqli_num_rows($sql_consulta);
              
              if($result >0){
              
              
             while($data=mysqli_fetch_array($sql_consulta)){

             
             
             ?>
             
            
            
              <option value="<?php echo $data['nombre_libro'];?>"><?php echo $data['nombre_libro'];?></option>
              
         
                  <?php
        }
    }
        ?>
        
              </select>
             </div>
             
             <div class="input-group">
          <label for="" class="etiqueta">Fecha que Recibe</label>
         <input type="date" name="dado" class="input-libro">
             </div>
          
           <div class="input-group">   
         <label for="" class="etiqueta">Fecha de Entrega</label>
         <input type="date" name="entrega" class="input-libro">
             </div>
             
             
         <input type="submit" value="Registrar Persona" class="btn btn-primary">
             
   </form>
    
</div>
  
   <?php include "includes/footer.php";?>
 
</body>
</html>