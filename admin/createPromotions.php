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
        <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

        <script type="text/javascript" src="js/promotions.js"></script>

    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                    <h1><strong>Crear una promocion</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'createCategories.php';?>" role="form" method="post" enctype="multipart/form-data">
                                                    <div class="linedive"></div>

                            <div class="cart-promo">
                                <div class="ctitle-promo">Shopping Cart</div>
                                <div>
                                    <table id="cartcontent" fitColumns="true">
                                        <thead>
                                            <tr>
                                                <th field="name" width=170>Nombre</th>
                                                <th field="quantity" width=110 align="right">Cant</th>
                                                <th field="price" width=100 align="right">Precio</th>
                                                <th field="delete" width=140 align="right">Eliminar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="products-promo">
                                <ul>
                                    <?php
                                    require 'database.php';
                                    $db = Database::connect();

                                    $statement = $db->query('SELECT products.p_id, products.p_name, products.p_description, products.p_price, categories.name AS category FROM products LEFT JOIN categories ON products.p_category = categories.id ORDER BY products.p_id DESC');



                                    $output = array('data' => array());

                                    while ($row = $statement->fetch()) {

                                    echo "<li>
                                        <a class ='item-promo'>
                                        <div>
                                        <p>".$row['p_name']."</p>
                                        <p>Precio: ₡".$row['p_price']."</p>
                                        </div>
                                        </a>
                                        </li>";
                                    } // /while 


                                    Database::disconnect();
                                    ?>

                                </ul>
                            </div>
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="CreateCategoriesName" name="CreateCategoriesName" placeholder="Nombre">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <p><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Crear</button>
                            </p>
                            <a class="btn btn-primary" href="promotions.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                       </div>
                    </form>
            </div>
        </div>   
    </body>
</html>
