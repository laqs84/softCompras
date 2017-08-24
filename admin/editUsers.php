<?php 	

require 'database.php';
$db = Database::connect();
$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
        
        $statement = $db->query('SELECT * FROM `users` WHERE `u_id` ='.$id);


while($row = $statement->fetch()) {
 			
 		$id = $row[0];	
 		$name = $row[1];
                $phone = $row[3];
                $address = $row[4];
                $email = $row[5];
                $level = $row[6];
                
 		 	
 }
 
 
    }

if($_POST) {	
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['telefono'];
        $address = $_POST['direccion'];
        $email = $_POST['email'];
        $level = $_POST['level'];
        $usersId = $id;
        
        $statement = $db->prepare("UPDATE users  set `u_name` = ?,`u_password` = ?,`u_phone` = ?,`u_address` = ?,`u_email` = ?,`u_level`= ? WHERE `u_id` = ?");

	if($statement->execute(array($name,md5($password),$phone,$address,$email,$level,$usersId))) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	


 
} // /if $_POST


    
    Database::disconnect();
    
        function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>




<!DOCTYPE html>
<html>
    <head>
        <?php include("head.php")?>
        <script src="js/users.js"></script>

    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                    <h1><strong>Editar Usuario</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'editUsers.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                                                <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $phone;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Direccion:</label>
                            <input type="address" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $address;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                            <span id="resultado" class="help-inline"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Level:</label>
                            <select class="form-control" id="level" name="level">
                                <option <?php if($level == 1){echo 'selected';} ?> value="1">Administrador</option> 
                                <option <?php if($level == 2){echo 'selected';} ?> value="2">Cliente</option>
                            </select>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <p><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Modificar</button></p>
                            <a class="btn btn-primary" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                       </div>
                    </form>
            </div>
        </div>   
    </body>
</html>