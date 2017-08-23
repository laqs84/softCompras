<?php 	


$nameError = "";


if($_POST) {	
        require 'database.php';
	$name = $_POST['name'];
        $pass = $_POST['password'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO users (u_name, u_password, u_phone, u_address, u_email, u_level) values(?, ?, ?, ?, ?, ?)");
            
            
            

	if($statement->execute(array($name,md5($pass),$telefono,$direccion,$email,$level))) {
	       $lastId = $db->lastInsertId();	
               header('Location: editUsers.php?id='.$lastId);
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	Database::disconnect();


 
} // /if $_POST

    ?>




<!DOCTYPE html>
<html>
    <head>
        <?php include("head.php")?>
        <script src="js/user.js"></script>

    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                    <h1><strong>Crear un usuario</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'createUsers.php';?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Direccion:</label>
                            <input type="address" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <span id="resultado" class="help-inline"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Level:</label>
                            <select class="form-control" id="level" name="level">
                                <option value="1">Administrador</option> 
                                <option value="2" selected>Cliente</option>
                            </select>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <p><button id="login-submit" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Crear</button>
                            </p>
                            <a class="btn btn-primary" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                       </div>
                    </form>
            </div>
        </div>   
    </body>
</html>
