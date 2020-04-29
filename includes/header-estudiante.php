<?php


include 'functions.php';

session_start();
    
if(empty($_SESSION['estudiante'])){
     
    header("Location: /proyecto-beta/login.php");
}
?>
  
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
   <?php include "includes/nav-estudiante.php"?>