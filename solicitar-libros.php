<?php
session_start();
include 'functions.php';
include 'data1.php';

if(empty($_SESSION['estudiante'])){
     
    header("Location: /proyecto-beta/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Libros</title>
    <link rel="stylesheet" href="estilos/profile.css">
    <?php include "scripts.php";?>
</head>
<body>
  
  <div class="contenedor-header">
   <header> 
     <h1> <a href="/proyecto-beta/profile_estudiante.php" class="biblioteca">Biblioteca</a></h1>
     <p id="venezuela">Venezuela, <?php   echo fecha();?></p>
     <div class="contenedor-span">
     <span class="label">Email:</span>
     <span class="user"><?php echo $_SESSION['email'];?></span>
     </div>
    <li><a href="logout.php" class="cerrar">Cerrar Sesión</a></li> 
     
    
    
   </header>
   
 </div>
   
     <div class="container-fluid navbar navbar-light " style="background-color: #6174EB;">

<nav class="navbar navbar-expand-lg  container">
  <a href="/proyecto-beta/profile_estudiante.php" id="nivel"><i class="fas fa-book"></i></a>
      <label id="nivel"><?php echo $_SESSION['usuario']?></label>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" id="myTab">
    <div class="navbar-nav ml-auto" >
      <a class="nav-item nav-link" href="/proyecto-beta/profile_estudiante.php">Inicio</a>
      <a class="nav-item nav-link" href="/proyecto-beta/solicitar-libros.php">Solicitar Libros</a>
      <a class="nav-item nav-link" href="/proyecto-beta/verlibros.php">Ver Libros</a>
       <a class="nav-item nav-link" href="/proyecto-beta/estatus-solicitud.php">Estatus de Solicitud</a>
     
      
    </div>
  </div>
</nav>
</div>
 <hr>
<div class="contenedor-formulario">
    
             <h2 class="registro-libros">Solicitar Libros</h2>
    

         <form action="enviarsolicitud.php" method="post" class="formulario">
         
         <div class="input-group">
         <label for="" class="etiqueta">Nombre de la persona</label>
         <input type="text" readonly name="nombre"  class="input-libro" value="<?php echo $_SESSION['name'];?>">
         </div>
         
         <div class="input-group">
         
         <input type="hidden" readonly name="id_estudiante"  class="input-libro" value="<?php echo $_SESSION['id'];?>">
         </div>
         
          <div class="input-group">
         <label for="" class="etiqueta">Fecha que realiza la solicitud</label>
         <input type="datetime" readonly name="fecha_solicitud"  class="input-libro"  value="<?php echo date("Y-m-d");?>">
         </div>
         
          <div class="input-group">
          <label for="" class="etiqueta">Cedula de identidad</label>
          <input type="text" readonly id="cedula" name="cedula" class="input-libro" value="<?php echo $_SESSION['cedula'];?>">
          </div>
          
          
             
              <div class="contenedor-input">
          <label for="" class="etiqueta">Libros</label>   
          <select name="nom_lib" id="">
             
              <?php
              $sql_consulta=mysqli_query($conexion,"SELECT id_libro,nombre_libro FROM libros");
             $result=mysqli_num_rows($sql_consulta);
              
              if($result >0){
              
              
             while($data=mysqli_fetch_array($sql_consulta)){

             
             
             ?>
             
            
            
              <option value="<?php echo $data['id_libro']; ?>"><?php echo $data['nombre_libro'];?></option>
              
         
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
             
             
         <input type="submit" value="Solicitar Libro" class="btn btn-primary">
             
   </form>
    
</div>


<style>

#nivel{
    font-size: 20px;
    color: black;
    margin-left: 8px;
   
}


</style>
   
    <?php include 'includes/footer.php';?>
</body>
</html>