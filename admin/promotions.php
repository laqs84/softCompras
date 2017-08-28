
<!DOCTYPE html>
<html>
    <head>

        <?php include("head.php"); ?>
        <script type="text/javascript">
            var managePromotionsTable;
            $(document).ready(function () {
                $('.nav-pills .promotions').addClass('active');

                managePromotionsTable = $('#managePromotionsTable').DataTable({
                    'ajax': 'fetchPromotions.php',
                    'order': []
                });
            });
        </script>

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
                            <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de promociones</div>
                        </div> <!-- /panel-heading -->
                        <div class="panel-body">

                            <div class="remove-messages"></div>

                            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                <a class="btn btn-default button1" id="addPromotionsModalBtn" href="createPromotions.php"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar categoría </a>
                            </div> <!-- /div-action -->				

                        </div>
                        <table class="table" id="managePromotionsTable">
                            <thead>
                                <tr>
                                    <th>Productos</th>
                                    <th>Precio</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Final</th>  
                                    <th style="width:15%;">Opciones</th>
                                </tr>
                            </thead>
                        </table>

                    </div> <!-- /panel-body -->
                </div> <!-- /panel -->		
            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
    </div>
</body>
</html>