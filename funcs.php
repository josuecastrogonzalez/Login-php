<?php



  function validarEmail($email){
      global $conexion;
      
    $sql_consultar=$conexion->prepare("SELECT * FROM users WHERE email= ?");
    $sql_consultar->bind_param('s',$email);
    $sql_consultar->execute();
    $sql_consultar->store_result();
    $num=$sql_consultar->num_rows;
    $sql_consultar->close();
    
    
    if($num > 0){
        
        return true;
        
    }else{
        
        return false;
   
    
    
    }
  }

function login($email,$password){
    
    global $conexion;
    
    
    $sql_consultar=$conexion->prepare("SELECT * FROM users WHERE email= ? AND password= ?");
    $sql_consultar->bind_param('ss',$email,$password);
    $sql_consultar->execute();
    $sql_consultar->store_result();
    $num=$sql_consultar->num_rows;
    
    if($num > 0 & password_verify($_POST['password'],$num['password'])){
        
        
        
        $_SESSION['user_id'] = $num['id'];
        header('Location: /profile1.php');
        
        
        
        
    }else{
        
        $message="ha ocurrido un error";
    }
}
	

function registrarUsuario($nombre,$email,$password,$genero,$cedula){
		
		
		global $conexion;
    
		$query_regitrar=mysqli_query($conexion,"INSERT INTO users(name,usuario,cedula,email,password,genero,rol) VALUES('$nombre','Estudiante','$cedula','$email','$password','$genero','2')");
    
        if($query_regitrar){
            return true;
            
        }else{
            return false;
        }
		
		}		
	
	function hashPassword($password) 
	{
		$hash = password_hash($password, PASSWORD_BCRYPT);
		return $hash;
	}
	
    
    function validarPassword($var1,$var2){
        
        if(strcmp($var1,$var2)!== 0){
            return false;
        }else{
            return true;
        }
        
    }


	function usuarioExiste($usuario)
	{
		global $conexion;
		
		$stmt = $conexion->prepare("SELECT usuario FROM users WHERE usuario = ? LIMIT 1");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
?>