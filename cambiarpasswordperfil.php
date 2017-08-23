<?php
session_start();
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$conexion = new mysqli('localhost', 'root', '', 'foodkart');
$output = array('respuesta' => array());
 
if( $password1 != "" && password2 != "" ){
   require 'database.php';
   $sql = " SELECT * FROM users WHERE u_id = ".$_SESSION['user_id'];
   $resultado = $conexion->query($sql);
   if( $resultado->num_rows > 0 ){
      $usuario = $resultado->fetch_assoc();
         if( $password1 === $password2 ){
            $sql = "UPDATE users SET u_password = '".md5($password1)."' WHERE u_id = ".$_SESSION['user_id'];
            $resultado = $conexion->query($sql);
         }
      if($resultado){
        
        $output = '<div class="alert alert-info"> La solicitud de restablecimiento de contraseña </div>';
      }
  
}
else
   $output= "Algun campo esta vacio";

 echo json_encode( $output );
}
