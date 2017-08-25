
<!DOCTYPE html>
<html>
    <head>

        <?php include("head.php"); ?>
        <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

        <script type="text/javascript" src="js/promotions.js"></script>
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <?php include 'menu.php'; ?>
        <div class="container admin">

            <div class="row">
                <div class="col-md-12">

                    <ol class="breadcrumb">
                        <li><a href="index.php">Inicio</a></li>		  
                        <li class="active">Promociones</li>
                    </ol>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de categorías</div>
                        </div> <!-- /panel-heading -->
                        <div class="panel-body">

                            <div class="remove-messages"></div>

                            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                <a class="btn btn-default button1" id="addPromotionsModalBtn" href="createCategories.php"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar categoría </a>
                            </div> <!-- /div-action -->				


                            <div class="cart-promo">
                                <div class="ctitle-promo">Shopping Cart</div>
                                <div>
                                    <table id="cartcontent" fitColumns="true">
                                        <thead>
                                            <tr>
                                                <th field="name" width=140>Nombre</th>
                                                <th field="quantity" width=60 align="right">Cantidad</th>
                                                <th field="price" width=60 align="right">Precio</th>
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
                                        <p>Precio:".$row['p_price']."</p>
                                        </div>
                                        </a>
                                        </li>";
                                    } // /while 


                                    Database::disconnect();
                                    ?>

                                </ul>
                            </div>
                        </div>


                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->		
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
    </div>
</body>
</html>