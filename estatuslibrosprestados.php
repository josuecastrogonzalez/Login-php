<?php
    include 'data1.php';
    include 'functions.php';
session_start();

if(empty($_SESSION['estudiante'])){
    
     header("Location: /proyecto-beta/profile_estudiante.php");
}


$id=($_SESSION['id']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estatus Libros Prestados</title>
    <?php include 'scripts.php'?>
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
  
  
   <section>
        
       <div class="contenedor-tabla">
       <div class="contenedor-titulo-libro">
    <h1 class="libros">Libros Prestado</h1>
         
    </div>
    
   <div class="container">
    <div class="container-sm">
    <table class="table table-bordered table-light table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre del Alumno</th>
            <th>Cedula</th>
            <th>Fecha que hizo la solicitud</th>
            <th>Nombre del libro</th>
            <th>Se le entrega a la persona el día</th>
            <th>Dia que Regresa el libro</th>
            <th>Estatus de la solicitud</th>
            <th>Editar</th>
            
        </tr>
        <?php   
        $query=mysqli_query($conexion,"SELECT * FROM personas WHERE id='$id'");  
        $result = mysqli_num_rows($query);
    
        if($result > 0){
        
        while($data= mysqli_fetch_array($query)){
            
            
            
            ?>
            <tr>
           <td><?php echo $data['id_solicitud']?></td>
            <td><?php echo $data['nombre']?></td>
            <td><?php echo $data['apellido']?></td>
            <td><?php echo $data['cedula']?></td>
            <td><?php echo $data['carrera']?></td>
            <td><?php echo $data['libro_prestado']?></td>
            <td><?php echo $data['fecha_dado']?></td>
            <td><?php echo $data['fecha_entregado']?></td>
            
            <td id="<?php echo $data['entregado']//Esto lo que haces que si la variable es "Sí", se aplicara la clase "color-verde" y si es no se aplicará la otra clase llamada "color-rojo"?>"><?php echo $data['entregado']?></td>
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
          
</body>
</html>