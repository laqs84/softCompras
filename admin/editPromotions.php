<!DOCTYPE html>
<html>
    <head>

<?php include("head.php") ?>
<?php
require 'database.php';
$db = Database::connect();
require('calendario.php');

$nameError = "";
$productsError = "";
$priceError = "";
$fechainicioError = "";
$fechafinalError = "";

$siexiste = false;
if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
    $siexiste = true;
}


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
        
         $statement = $db->prepare("UPDATE promociones  set nombre = ?, productosids = ?, precio = ?, fechainicio = ?, fechafinal= ?  WHERE id = ?");
        //$statement = $db->prepare("INSERT INTO promociones (productosids, precio, fechainicio, fechafinal) values(?,?,?,?)");




        if ($statement->execute(array($name, $products, $price, $fechainicio, $fechafinal, $id))) {
            
            header('Location: editPromotions.php?id=' . $id);
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error no se ha podido actualizar";
        }

       
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

        <script type="text/javascript" src="js/editpromotions.js"></script>
        <script>
        $(function () {
    $('#cartcontent').datagrid({
        singleSelect: true,
        showFooter: true
    });
    $('.item-promo').draggable({
        revert: true,
        proxy: 'clone',
        onStartDrag: function () {
            $(this).draggable('options').cursor = 'not-allowed';
            $(this).draggable('proxy').css('z-index', 10);
        },
        onStopDrag: function () {
            $(this).draggable('options').cursor = 'move';
        }
    });
    $('.cart-promo').droppable({
        onDragEnter: function (e, source) {
            $(source).draggable('options').cursor = 'auto';
        },
        onDragLeave: function (e, source) {
            $(source).draggable('options').cursor = 'not-allowed';
        },
        onDrop: function (e, source) {
            var name = $(source).find('p:eq(0)').html();
            var price = $(source).find('p:eq(1)').html();
            var id = $(source).find('p:eq(2)').html();
            addProduct(name, parseFloat(price.split('₡')[1]), id);
        }
    });
});
        </script>
    </head>

    <body>

        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Editar la promocion numero <?php echo $id; ?></strong></h1>
                <br>
                <form class="form" action="<?php echo 'editPromotions.php?id='.$id; ?>" role="form" method="post" enctype="multipart/form-data">
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

$statement = $db->query('SELECT products.p_id, products.p_name, products.p_description, products.p_price, categories.name AS category FROM products LEFT JOIN categories ON products.p_category = categories.id ORDER BY products.p_id DESC');



$output = array('data' => array());

while ($row = $statement->fetch()) {

    echo "<li class='" . $row['p_id'] . "'>
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
                    <?php

$nameError = "";

if ($siexiste) {

    $statement = $db->query('SELECT * FROM `promociones` WHERE `id` =' . $id);


    while ($row = $statement->fetch()) {

        $id = $row[0];
        $nombre = $row[1];
        $productosids = $row[2];
        $precio = $row[3];
        $fechainicio = $row[4];
        $fechafinal = $row[5];
        
    $products = "";
    $var = explode(',', $row[2]);
    foreach ($var as $row2) {

        if ($row2 != "" && !empty($row2)) {
            $statementp = $db->query('SELECT * FROM products WHERE p_id =' . $row2);
            
            while ($rowp = $statementp->fetch()) {
                ?>
        <script type="text/javascript">
            function agregarproductos<?php echo $rowp['p_id'];?>(){
            addProduct('<?php echo $rowp['p_name'];?>', parseFloat(<?php echo $rowp['p_price'];?>), '<?php echo $rowp['p_id'];?>');
        }
            setTimeout('agregarproductos<?php echo $rowp['p_id'];?>()',500);   
            
                   
         </script>
                 <?php
            }
        }//
    }
    }
}

function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
         
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio:</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Precio" value="<?php echo $precio;?>">
                        <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="fechainicio">Fecha Inicio:</label>
                        <input type="text" class="form-control" id="fechainicio" name="fechainicio" placeholder="Fecha Inicio" value="<?php echo $fechainicio;?>">
                        <span class="help-inline"><?php echo $fechainicioError; ?></span>
                        <a id="fechainicioc" onclick="show_calendar();" style="cursor: pointer;"><small>(calendario)</small></a>
                    </div>
                    <div class="form-group">
                        <label for="fechafinal">Fecha Final:</label>
                        <input type="text" class="form-control" id="fechafinal" name="fechafinal" placeholder="Fecha Final" value="<?php echo $fechafinal;?>">
                        <span class="help-inline"><?php echo $fechafinalError; ?></span>
                        <a id="fechafinalc" onclick="show_calendar();" style="cursor: pointer;"><small>(calendario)</small></a>
                        <input type="hidden" class="form-control" id="products" value="<?php echo $productosids; ?>" name="products">
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