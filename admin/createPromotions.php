


<!DOCTYPE html>
<html>
    <head>

        <?php include("head.php") ?>
        <?php
        require('calendario.php');

        $nameError = "";
        $productsError = "";
        $priceError = "";
        $fechainicioError = "";
        $fechafinalError = "";



        if ($_POST) {
            $name = $_POST['nombre'];
            $products = $_POST['products'];
            $price = $_POST['price'];
            $fechainicio = $_POST['fechainicio'];
            $fechafinal = $_POST['fechafinal'];

            if (empty($name)) {
                $nameError = "Poner un nombre a la promocion";
            }
            if (empty($products)) {
                $productsError = "Seleciona un producto";
            }

            if (empty($price)) {
                $priceError = " El campo del precio esta vacio";
            }

            if (empty($fechainicio)) {
                $fechainicioError = "El campo de la fecha inicio esta vacio";
            }

            if (empty($fechafinal)) {
                $fechafinalError = "El campo de la fecha final esta vacio";
            }

            if ($fechafinal > $fechainicio) {
                require 'database.php';
                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO promociones (nombre, productosids, precio, fechainicio, fechafinal) values(?,?,?,?,?)");




                if ($statement->execute(array($name,$products, $price, $fechainicio, $fechafinal))) {
                    $lastId = $db->lastInsertId();
                    header('Location: editPromotions.php?id=' . $lastId);
                } else {
                    $valid['success'] = false;
                    $valid['messages'] = "Error no se ha podido actualizar";
                }

                Database::disconnect();
            } else {
                $fechafinalError = "La fecha final no es mayor que fecha inicio";
            }
        } // /if $_POST
        ?>
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
                <form class="form" action="<?php echo 'createPromotions.php'; ?>" role="form" method="post" enctype="multipart/form-data">
                    <div class="linedive"></div>

                    <div class="cart-promo">
                        <div class="ctitle-promo">Productos</div>
                        <span class="help-inline"><?php echo $productsError; ?></span>
                        <div>
                            <table id="cartcontent" fitColumns="true">
                                <thead>
                                    <tr field="id">
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
                                        <p>" . $row['p_name'] . "</p>
                                        <p>Precio: ₡" . $row['p_price'] . "</p>
                                        <p class='hidden'>" . $row['p_id'] . "</p>
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
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio:</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Precio">
                        <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="fechainicio">Fecha Inicio:</label>
                        <input type="text" class="form-control" id="fechainicio" name="fechainicio" placeholder="Fecha Inicio">
                        <span class="help-inline"><?php echo $fechainicioError; ?></span>
                        <a id="fechainicioc" onclick="show_calendar();" style="cursor: pointer;"><small>(calendario)</small></a>
                    </div>
                    <div class="form-group">
                        <label for="fechafinal">Fecha Final:</label>
                        <input type="text" class="form-control" id="fechafinal" name="fechafinal" placeholder="Fecha Final">
                        <span class="help-inline"><?php echo $fechafinalError; ?></span>
                        <a id="fechafinalc" onclick="show_calendar();" style="cursor: pointer;"><small>(calendario)</small></a>
                        <input type="hidden" class="form-control" id="products" name="products">
                    </div>
                    <div class="form-group">
                        <div id="calendario">
                            <?php calendar_html() ?>
                        </div>
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