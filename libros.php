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
    <h1 class="libros">Lista de Libros</h1>
     <a href="registrarlibros.php" class="enlace-registro">Registrar Libros</a>
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
            <th>Editar</th>
            <th>Eliminar</th>
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
               <button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar">Editar</button></td>
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
     
     <div class="contenedor-reporte">
    <a class="btn btn-info btn-lg" href="reportes.php" role="button" id="reporte">Reporte</a>
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
        <form action="editar_libros.php" method="post">
          
           <input type="hidden"  readonly name="id" id="update_id"> 
            <div class="form-group">
                <label for="" class="etiqueta">Nombre del Libro</label>
                <input type="text" name="libro" id="libro" class="form-control">
                
                <label for="" class="etiqueta">Autor</label>
                <input type="text" name="autor"  id="autor"class="form-control">
                
                <label for="" class="etiqueta">Año</label>
                <input type="text" name="ano" id="ano"  class="form-control">
                
                <label for="" class="etiqueta">Genero</label>
                <input type="text" name="genero" id="genero" class="form-control">
                
                <label for="" class="etiqueta">Comentario</label>
                <input type="text" name="comentario" id="comentario" class="form-control">
                
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
    
     <!-- Modal ELIMINAR LIBROS-->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Libros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h5>¿Estás seguro que desea eliminar el libro?</h5>
        <!-- Formulario-->
        <form action="eliminar.php" method="post">
          
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
            $('#libro').val(datos[1]);
            $('#autor').val(datos[2]);
            $('#ano').val(datos[3]);
            $('#genero').val(datos[4]);
            $('#comentario').val(datos[5]);
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
     
     
     
  <?php include "includes/footer.php";?>
</body>
</html>