<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            require 'database.php';
            
            
            $sql = "SELECT * FROM users WHERE u_email = '$b'";
            $resultado = $conexion->query($sql);
       
            
             
            if($resultado->num_rows == 0){
                  echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:red;'>El correo de usuario ya existe.</span>";
            }
      }     
?>