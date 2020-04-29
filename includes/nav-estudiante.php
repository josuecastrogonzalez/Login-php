
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