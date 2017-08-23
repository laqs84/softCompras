<!DOCTYPE html>
<html>
    <head>
        
        <?php include("head.php"); ?>
        <script src="js/products.js"></script>
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <?php include 'menu.php'; ?>
        <div class="container admin">
            
            <div class="row">
                <div class="col-md-12">

                    <ol class="breadcrumb">
                        <li><a href="index.php">Inicio</a></li>		  
                        <li class="active">Productos</li>
                    </ol>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de productos</div>
                        </div> <!-- /panel-heading -->
                        <div class="panel-body">

                            <div class="remove-messages"></div>

                            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                <a class="btn btn-default button1" id="addCategoriesModalBtn" href="insert.php"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar producto </a>
                            </div> <!-- /div-action -->				

                            <table id="manageProductsTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                            <!-- /table -->

                        </div> <!-- /panel-body -->
                    </div> <!-- /panel -->		
                </div> <!-- /col-md-12 -->
            </div> <!-- /row -->
        </div>


    </body>
</html>
