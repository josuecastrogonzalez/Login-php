<?php
    include 'data1.php';
    include 'functions.php';
 
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
  
     <?php include "scripts.php";?>
    
    
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


<style>

#nivel{
    font-size: 20px;
    color: black;
    margin-left: 8px;
   
}


</style>
   
    <section>
        
       <div class="contenedor-tabla">
       <div class="contenedor-titulo-libro">
    <h1 class="libros">Lista de Libros</h1>
    
    </div>
    
   <div class="container">
    <div class="container-sm">
    <table class="table table-bordered table-light table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre Del libro</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Genero</th>
            <th>Comentario</th>
            
        </tr>
        <?php   
        $query=mysqli_query($conexion,"SELECT * FROM libros");  
        $result = mysqli_num_rows($query);
    
        if($result > 0){
        
        while($data= mysqli_fetch_array($query)){
            
            
            
            ?>
            <tr>
           <td><?php echo $data['id_libro']?></td>
            <td><?php echo $data['nombre_libro']?></td>
            <td><?php echo $data['autor']?></td>
            <td><?php echo $data['ano']?></td>
            <td><?php echo $data['genero']?></td>
            <td><?php echo $data['comentario']?></td>
            <td>
               
                
            
            
        
        <?php
        }
    }
        ?>
        
        
        
      
        </tr>
    </table>
    </div>
    </div>
    </div>
     </section>
     
 
       
        
   
   
   
   
    
     
     
     
  <?php include "includes/footer.php";?>
</body>
</html>