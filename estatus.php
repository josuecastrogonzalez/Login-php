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
    <h1 class="libros">Lista de Personas</h1>
     <a href="registrarlibros.php" class="enlace-registro">Registrar Personas</a>
    </div>
    
   
    <div class="container">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr class="danger">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Carrera</th>
            <th>Libro</th>
            <th>Fecha que se entregó el libro</th>
            <th>Fecha para entregar el libro</th>
            <th>Entregado</th>
            <th>Editar</th>
            <th>Eliminar</th>
            
        </tr>
        <?php   
        $query=mysqli_query($conexion,"SELECT * FROM personas");  
        $result = mysqli_num_rows($query);
    
        if($result > 0){
        
        while($data= mysqli_fetch_array($query)){
            
            
            
            ?>
            <tr>
           <td><?php echo $data['id_personas']?></td>
            <td><?php echo $data['nombre']?></td>
            <td><?php echo $data['apellido']?></td>
            <td><?php echo $data['cedula']?></td>
            <td><?php echo $data['carrera']?></td>
            <td><?php echo $data['libro_prestado']?></td>
            <td><?php echo $data['fecha_dado']?></td>
            <td><?php echo $data['fecha_entregado']?></td>
            
            <td class="<?php echo ($data['entregado']=="Sí")?'color-verde':'color-rojo'//Esto lo que haces que si la variable es "Sí", se aplicara la clase "color-verde" y si es no se aplicará la otra clase llamada "color-rojo"?>"><?php echo $data['entregado']?></td>
            
            
            
            <td><button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar" >Editar</button></td>
            <td><button type="button" class="btn btn-danger eliminarbtn" data-toggle="modal" data-target="#eliminar">Eliminar</button></td>
                
            
            
        
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
        <form action="editar_personas.php" method="post">
          
           <input type="hidden" name="id" id="update_id"> 
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                
                <label for="">Apellido</label>
                <input type="text" name="apellido"  id="apellido" class="form-control">
                
                <label for="">Cedula</label>
                <input type="text" name="cedula" id="cedula"  class="form-control">
                
                
                <label for="">Carrera</label>
                <input type="text" id="carrera" name="carrera" readonly class="form-control">
                    
                
                
                <label for="">Libro</label>
                <select name="nom_lib" id="nom_lib" class="form-control">
                        <?php
                    
                  
             $sql_consulta=mysqli_query($conexion,"SELECT * FROM libros");
             $result=mysqli_num_rows($sql_consulta);
              
              if($result >0){
              
              
             while($data=mysqli_fetch_array($sql_consulta)){

             
             
             ?>
             
            
            
              <option value="<?php echo $data['nombre_libro'];?>"><?php echo $data['nombre_libro']?></option>
              
         
                  <?php
        }
              }
        ?>
                    
                </select>
                
                <label for="">Fecha dado</label>
                <input type="date" name="dado" id="fecha_dado" class="form-control">
                
                 <label for="">Fecha a entregar</label>
                <input type="date" name="entrega" id="fecha_entregar" class="form-control">
                
                <label for="">Entregado</label>
                 <select name="entregado" id="entregado" class="form-control" required>
                   
                     <option value="No">No</option>
                     <option value="Sí">Sí</option>
                     
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
    <div class="contenedor-reporte">
    <a class="btn btn-info btn-lg" href="reportes2.php" role="button" id="reporte">Reporte</a>
     </div>
    
     <!-- Modal ELIMINAR PERSONA-->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h5>¿Estás seguro que desea eliminar a la persona?</h5>
        <!-- Formulario-->
        <form action="eliminar_persona.php" method="post">
          
           <input type="hidden"   name="id" id="delete_id"> 
            <div class="form-group">
             
            </div>
            
            
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Sí, eliminar</button>
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
            
            $('#update_id').val(datos[0]);
            $('#nombre').val(datos[1]);
            $('#apellido').val(datos[2]);
            $('#cedula').val(datos[3]);
            $('#carrera').val(datos[4]);
            $('#nom_lib').val(datos[5]);
            $('#fecha_dado').val(datos[6]);
            $('#fecha_entregar').val(datos[7]);
            $('#entregado').val(datos[8]);
           
        });
        
    
    
    </script>
    
       <!-- AL DARLE CLICK MUESTRA LOS DATOS PARA ELIMINARLOS-->
   
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
     <style type="text/css">
    
    
    .color-verde{
    background: green;
    color: white;
    
}
.color-rojo{
    background: red;
    color: white;
}
    
    </style>
     
     <?php include "includes/footer.php";?>
  
</body>
</html>