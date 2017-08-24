<?php
	
	session_start();
        require 'admin/database.php';
	
	if (isset($_POST['login-submit'])) {

		if (isset($_POST['emailaddress']) && isset($_POST['pass'])) {
			$email = $_POST['emailaddress'];
			$pass = $_POST['pass'];

                        $password = md5($pass);
			$pdo =  Database::connect();
                        $pdo = $pdo->prepare('SELECT * FROM users WHERE u_email = ?');
                        $pdo->execute(array($email));
			$item = $pdo->fetch();

			
			if (($item !== false) && ($pdo->rowCount() > 0)) {
				if ($item['u_password'] == $password) {

					$_SESSION['is_auth'] = true;
					$_SESSION['user_level'] = $item['u_level'];
					$_SESSION['user_id'] = $item['u_id'];
					$_SESSION['name'] = $item['u_name'];
                                        
                                        
                                        
                                        if($_SESSION['user_level'] != 1){
					header('location: home/index.php');
                                        }
                                        else {
                                        header('location: admin/index.php');    
                                        }
					exit;
				}
				else {
					$error = "Correo electrónico o contraseña no válidos. Vuelve a intentarlo.";
                                        header('location: login.php?error='.$error);
				}
			}
			else {
				$error = "Correo electrónico o contraseña no válidos. Vuelve a intentarlo.";
                                header('location: login.php?error='.$error);
			}
		}
		else {
			$error = "Introduzca un correo electrónico y una contraseña para iniciar sesión.";
                        header('location: login.php?error='.$error);
		}
	}
?>