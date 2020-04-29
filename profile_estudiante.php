



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
  <?php include "scripts.php";?>
  <link rel="stylesheet" href="estilos/profile.css">
  
<meta name="viewport" content="width=device-width, initial-scale=1">

  
        
</head>
<body>
   
   <?php include "includes/header-estudiante.php";?>

  <div class="contenedor-section">
   <section>
     
       <h1 class="bienvenido">Bienvenido Estudiante <?php echo $_SESSION['name'];?> </h1>
       
       <div class="contenedor-informacion">
           
           <div class="imagen">
           <div class="<?php echo ($_SESSION['genero']=="Hombre")?'hombre':'mujer'?>">
           
           
            </div>
           </div>
           
           
       </div>
       
   </section>
   
   </div>
 
        
    
    <?php include "includes/footer.php";?>
</body>
</html>
