<?php
//Destruir la sesion
session_start();


session_destroy();

header('Location: /proyecto-beta/login.php');


?>