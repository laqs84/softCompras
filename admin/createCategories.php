<?php 	


$nameError = "";


if($_POST) {	
        require 'database.php';
	$name = $_POST['CreateCategoriesName'];
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO categories (name) values(?)");
            
            
            

	if($statement->execute(array($name))) {
	       $lastId = $db->lastInsertId();	
               header('Location: editCategories.php?id='.$lastId);
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
                <script src="js/categories.js"></script>

    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                    <h1><strong>Crear una Categoria</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'createCategories.php';?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="CreateCategoriesName" name="CreateCategoriesName" placeholder="Nombre">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <p><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Crear</button>
                            </p>
                            <a class="btn btn-primary" href="categories.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                       </div>
                    </form>
            </div>
        </div>   
    </body>
</html>
