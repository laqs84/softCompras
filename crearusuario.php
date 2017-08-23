<?php

$nameError = "";


if ($_POST) {
    
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    if (!empty($email)) {
     
        require 'database.php';


        $sql = "SELECT * FROM users WHERE u_email = '$email'";
        $resultado = $conexion->query($sql);



        if ($resultado->num_rows == 0) {
            
        
    require 'admin/database.php';
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO users (u_name, u_password, u_phone, u_address, u_email, u_level) values(?, ?, ?, ?, ?, ?)");




    if ($statement->execute(array($name, md5($pass), $telefono, $direccion, $email, $level))) {
        $lastId = $db->lastInsertId();
        header('Location: login.php');
    } else {
        header('Location: login.php?error=Paso algo en la insertacion');
    }

    Database::disconnect();
        } else {
            $error = "El correo de usuario ya existe.";
            header('Location: login.php?error='.$error);
        }
    }
} // /if $_POST

?>