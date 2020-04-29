<?php

session_start();
include 'functions.php';
include 'data1.php';
/*
if(isset($_SESSION['user_id'])){
    
    $consultar=$conexion->prepare("SELECT id_libro,id_estudiante,id_solicitud FROM solicitud WHERE id=:id");
    $consultar->bind_param(':id',$_SESSION['user_id']);
    $consultar->execute();
    $resultados=mysqli_fetch($consultar);
    
    
    $user=null;
    
    if(count($resultados)>0){
        $user=$resultados;
    }
}*/

$id=($_SESSION['id']);
$cedula=($_SESSION['cedula']);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estatus Solicitud</title>
    <?php include "scripts.php";?>
    <link rel="stylesheet" href="estilos/profile.css">
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
   
     <div class="container-fluid navbar navbar-light " style="background-color:#6174EB;">

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

 <section>
        
       <div class="contenedor-tabla">
       <div class="contenedor-titulo-libro">
    <h1 class="libros">Estatus de Solicitud</h1>
     
    </div>
    
   
    <div class="container">
    <div class="table-responsive">    
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr class="danger">
            <th>Numero de Solicitud</th>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Fecha de entrega</th>
            <th>Fecha de devolución</th>
            <th>Libro Pedido</th>
            <th>Fecha que hizo la Solicitud</th>
            <th>Estado</th>
            
        </tr>
        <?php   
        $query=mysqli_query($conexion,"SELECT u.name, l.id_libro,l.nombre_libro,solicitud.id_solicitud,solicitud.id_estudiante,solicitud.fecha_recibe,solicitud.fecha_entrega,solicitud.estatus_solicitud,solicitud.fecha_solicitud,solicitud.id_libro FROM solicitud INNER JOIN users u ON solicitud.id_estudiante=u.id INNER JOIN libros l ON solicitud.id_libro=l.id_libro WHERE id_estudiante='$id'");  
        $result = mysqli_num_rows($query);
    
        if($result > 0){
        
        while($data= mysqli_fetch_array($query)){
            
            
            
            ?>
            <tr>
           <td><?php echo $data['id_solicitud']?></td>
           <td><?php echo $data['name']?></td>
            <td><?php echo $cedula;?></td>
            
            <td><?php echo $data['fecha_recibe']?></td>
            <td><?php echo $data['fecha_entrega']?></td>
            
            <td><?php echo $data['nombre_libro']?></td>
            <td><?php echo $data['fecha_solicitud']?></td>
            
            
            
            <td id="<?php echo $data['estatus_solicitud']//Esto lo que haces que si la variable es "Sí", se aplicara la clase "color-verde" y si es no se aplicará la otra clase llamada "color-rojo"?>"><?php echo $data['estatus_solicitud']?></td>
            
           <style>
                    #Rechazado{
                        background: red;
                        color: white;
                        font-weight: bold;
                        border: 2px solid black;
                    }
                    #Pendiente{
                        background: orange;
                        color: white;
                        font-weight: bold;
                        border: 2px solid black;
                    }
                    #Aceptado{
                        background: green;
                        color:white;
                        font-weight: bold;
                        border: 2px solid black;
                        
                    }
                
                
                </style>
            
            
            
            
        
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