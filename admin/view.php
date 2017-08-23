<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT products.p_id, products.p_name, products.p_description, products.p_price, products.p_image, categories.name AS category FROM products LEFT JOIN categories ON products.p_category = categories.id WHERE products.p_id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
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
        <?php include("head.php");?>
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Ver producto</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nombre:</label><?php echo '  '.$item['p_name'];?>
                      </div>
                      <div class="form-group">
                        <label>Descripción:</label><?php echo '  '.$item['p_description'];?>
                      </div>
                      <div class="form-group">
                        <label>Precio:</label><?php echo '  '.number_format((float)$item['p_price'], 2). ' $';?>
                      </div>
                      <div class="form-group">
                        <label>Categoría:</label><?php echo '  '.$item['category'];?>
                      </div>
                      <div class="form-group">
                        <label>Imagen:</label><?php echo '  '.$item['p_image'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                    </div>
                </div> 
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../images/'.$item['p_image'];?>" alt="...">
                        <div class="price">₡ <?php echo number_format((float)$item['p_price'], 2);?></div>
                          <div class="caption">
                            <h4><?php echo $item['p_name'];?></h4>
                            <p><?php echo $item['p_description'];?></p>
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ordenar</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

