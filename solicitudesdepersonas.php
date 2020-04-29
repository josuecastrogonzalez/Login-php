<?php
    include 'data1.php';
    include 'functions.php';
session_start();

if(empty($_SESSION['admin'])){
    
     header("Location: /proyecto-beta/profile_admin.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitudes de Personas</title>
    <?php include 'scripts.php';?>
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
    <h1 class="libros">Solicitudes de Estudiantes</h1>
         
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
            <th>Fecha de entrega</th>
            <th>Fecha de devolución</th>
            <th>Estatus</th>
            <th>Editar</th>
            
        </tr>
        <?php   
        $query=mysqli_query($conexion,"SELECT u.name,u.cedula,l.id_libro,l.nombre_libro,solicitud.id_solicitud,solicitud.id_estudiante,solicitud.fecha_recibe,solicitud.fecha_entrega,solicitud.estatus_solicitud,solicitud.fecha_solicitud,solicitud.id_libro FROM solicitud INNER JOIN users u ON solicitud.id_estudiante=u.id INNER JOIN libros l ON solicitud.id_libro=l.id_libro");  
        $result = mysqli_num_rows($query);
    
        if($result > 0){
        
        while($data= mysqli_fetch_array($query)){
            
            
            
            ?>
            <tr>
           <td><?php echo $data['id_solicitud']?></td>
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['cedula']?></td>
            <td><?php echo $data['fecha_solicitud']?></td>
            <td><?php echo $data['nombre_libro']?></td>
            <td><?php echo $data['fecha_recibe']?></td>
            <td><?php echo $data['fecha_entrega']?></td>
            <td id="<?php echo $data['estatus_solicitud']//Esto lo que haces que si la variable es "Sí", se aplicara la clase "color-verde" y si es no se aplicará la otra clase llamada "color-rojo"?>"><?php echo $data['estatus_solicitud']?></td>
            <td>
               <button type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#editar">Editar</button></td>
               
                
                
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
     
     <div class="contenedor-reporte">
    <a class="btn btn-dark btn-lg" href="reportesolicitud.php" role="button" id="reporte">Reporte de todas las solicitudes</a>
     </div>
     <div class="contenedor-reporte">
    <a class="btn btn-dark btn-lg" href="reportessolicitudpendiente.php" role="button" id="reporte">Reporte de los estatus "Pendiente"</a>
     </div>
     
     <!-- Modal EDITAR LIBROS-->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Libros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <!-- Formulario-->
        <form action="editar_solicitud.php" method="post">
          
           <input type="hidden"  readonly name="id" id="update_solicitud"> 
            <div class="form-group">
                <label for="" class="etiqueta">Nombre de la persona</label>
                <input type="text" readonly name="nombre" id="nombre" class="form-control" >
                
                <label for="" class="etiqueta">Cedula</label>
                <input type="text"  readonly name="cedula"  id="cedula" class="form-control">
                
                
                <label for="" class="etiqueta">Nombre del libro</label>
                <input type="text" readonly name="nombre_libro" id="nombre_libro" class="form-control">
                
                <label for="" class="etiqueta">Dia que se le entrega el libro</label>
                <input type="text" readonly name="entregalibro" id="entregalibro" class="form-control">
                
                <label for="" class="etiqueta">Dia que regresa el libro</label>
                <input type="text" readonly  name="regresalibro" id="regresalibro" class="form-control">
                
               <label for="">Estatus De Solicitud</label>
                 <select name="estatus_solicitud" id="estatus_solicitud" class="form-control" required>
                   
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aceptado">Aceptado</option>
                     <option value="Rechazado">Rechazado</option>
                 </select>
                
            </div>
            
            
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Modififar</button>
      </div>
       
        </form>
        
      </div>
      
    </div>
  </div>
</div>
    
  
   
   
   
    <!-- AL DARLE CLICK MUESTRA LOS DATOS PARA EDITARLO-->
   
    <script>
    
        $('.editbtn').on('click',function(){
        
            $tr=$(this).closest('tr');
            
            var datos=$tr.children('td').map(function(){
                
                return $(this).text();
                
                
            });//children, elementos secundarios, map es como un foreach (recorre)
           
            
            //Mostrar datos al darle click
            
            $('#update_solicitud').val(datos[0]);
            $('#nombre').val(datos[1]);
            $('#cedula').val(datos[2]);
           
            $('#nombre_libro').val(datos[4]);
            $('#entregalibro').val(datos[5]);
            $('#regresalibro').val(datos[6]);
            $('#estatus_solicitud').val(datos[7]);
        });
        
    
    
    </script>
    
       <!-- AL DARLE CLICK MUESTRA LOS DATOS PARA ELIMINARLO-->
   
    <script>
    
        $('.eliminarbtn').on('click',function(){
        
            $tr=$(this).closest('tr');
            
            var datos=$tr.children('td').map(function(){
                
                return $(this).text();
                
                
            });//children, elementos secundarios, map es como un foreach (recorre)
           
            
            //Mostrar datos al darle click
            
            $('#delete_id').val(datos[0]);
           
        });
        
    
    
    </script>
      
    
   
    
</body>
</html>