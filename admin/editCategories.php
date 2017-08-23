<?php 	

require 'database.php';
$db = Database::connect();
$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
        
        $statement = $db->query('SELECT `id`, `name` FROM `categories` WHERE `id` ='.$id);


while($row = $statement->fetch()) {
 			
 		$id = $row[0];	
 		$name = $row[1];	
 		 	
 }
 
 
    }

if($_POST) {	

	$brandName = $_POST['editCategoriesName'];
        $categoriesId = $id;
        
        $statement = $db->prepare("UPDATE categories  set name = ? WHERE id = ?");

	if($statement->execute(array($brandName,$categoriesId))) {
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
                <script src="js/categories.js"></script>

    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Editar Categoria</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'editCategories.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre:
                            <input type="text" class="form-control" id="editCategoriesName" name="editCategoriesName" placeholder="Nombre" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
                            <a class="btn btn-primary" href="categories.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                       </div>
                    </form>
                </div>

            </div>
        </div>   
    </body>
</html>
