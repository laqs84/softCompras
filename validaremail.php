<?php
$email = $_POST['email'];

require 'database.php';
$output = array('respuesta' => array());
 
if( $email != "" ){
   
   $sql = " SELECT * FROM users WHERE u_email = '$email' ";
   $resultado = $conexion->query($sql);
   if($resultado->num_rows > 0){
      $usuario = $resultado->fetch_assoc();
      $linkTemporal = generarLinkTemporal( $usuario['u_id'], $usuario['u_name'] );
      if($linkTemporal){
        //enviarEmail( $email, $linkTemporal );
        $output = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      }
   }
   else
      $output = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
}
else
   $output= "Debes introducir el email de la cuenta";

 echo json_encode( $output );
 exit();

function generarLinkTemporal($idusuario, $username){
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
 
   $conexion = new mysqli('localhost', 'root', '', 'foodkart');
   // Se inserta el registro en la tabla tblreseteopass
   $sql = "INSERT INTO tblreseteopass (u_id, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";
   $resultado = $conexion->query($sql);
   
   if($resultado == FALSE){
       $sql = "DELETE FROM tblreseteopass WHERE u_id =".$idusuario;
       $resultado = $conexion->query($sql);
       generarLinkTemporal($idusuario, $username);
   }
   
   if($resultado){
      // Se devuelve el link que se enviara al usuario
      $enlace = $_SERVER["SERVER_NAME"].'/serverfood/restablecer.php?u_id='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }
   else
      return FALSE;
}
 
function enviarEmail( $email, $link ){
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: Softteca <info@softteca.com>' . "\r\n";
   // Se envia el correo al usuario
   mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
}