<?php
include 'functions.php';
session_start();
   if(empty($_SESSION['admin'])){
    
     header("Location: /proyecto-beta/profile_estudiante.php");
}


    
        
if(!empty($_POST)){
    
    $alert='';
    
    if(empty($_POST['libro'])|| empty($_POST['autor']) || empty($_POST['ano'])|| empty($_POST['genero']) || empty($_POST['comentario'])){
        
        $alert ='<p class="m_error">Llene todos los datos</p>';
    }else{
       include "data1.php";
        
        $libro = $_POST['libro'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];
        $genero = $_POST['genero'];
        $comentario = $_POST['comentario'];
        
        $query_insertar= mysqli_query($conexion, "INSERT INTO libros(nombre_libro,autor,ano,genero,comentario)
                                        VALUES('$libro','$autor','$ano','$genero','$comentario')");
        
        if($query_insertar){
            $alert ='<p class="m_guardar">Se ha registrado el libro</p>';
        }else{
             $alert ='<p class="m_error">No se ha registrado el libro</p>';
        }
    }
    
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libros</title>
    <?php include "scripts.php";?>
    <link rel="stylesheet" href="estilos/profile.css">
    
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
        
        <h2 class="registro-libros">Registro de Libros</h2>
        <form action="" method="post" class="formulario1"> 
        
        <div class="input-group">
         <label for="" class="etiqueta1">Nombre del Libro</label>
         <input type="text" name="libro" class="input-libro">
          </div>
          
          <div class="input-group">
           <label for="" class="etiqueta1">Autor</label>
         <input type="text" name="autor" class="input-libro">
            </div>
            
            <div class="input-group">
         <label for="" class="etiqueta1">Año</label>
         <input type="number" name="ano" class="input-libro">
         </div>
         
         <div class="input-group">
         <label for="" class="etiqueta1">Genero</label>
         <input type="text" name="genero" class="input-libro">
            </div>
         
         <div class="input-group">
         <label for="" class="etiqueta1">Comentario</label>
        <input type="textar" name="comentario" class="comentario">
        </div>
           
        <input type="submit" value="Registrar Libro" class="btn btn-primary">
        
         <input type="reset" class="btn btn-secondary" value="Limpiar">
       
        
        </form>
        
    </div>
    <?php include "includes/footer.php";?>
    
    <script src="function.js"></script>
</body>
</html>