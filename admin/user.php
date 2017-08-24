
<!DOCTYPE html>
<html>
    <head>

        <?php include("head.php"); ?>
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <?php include 'menu.php'; ?>
        <div class="container admin">

            <div class="row">
                <div class="col-md-12">

                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Inicio</a></li>		  
                        <li class="active">Usuarios</li>
                    </ol>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Usuarios</div>
                        </div> <!-- /panel-heading -->
                        <div class="panel-body">

                            <div class="remove-messages"></div>

                            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                <a href="createUsers.php" class="btn btn-default button1"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar Usuario </a>
                            </div> <!-- /div-action -->				

                            <table class="table" id="manageUserTable">
                                <thead>
                                    <tr>							
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th style="width:15%;">Opciones</th>
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





<script src="js/user.js"></script>