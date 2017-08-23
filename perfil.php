<?php
session_start();
if (!empty($_GET) && $_SESSION['user_id'] == $_GET['id'] ) {
    $id = $_GET['id'];
    require 'admin/database.php';
    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM users where u_id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $name = $item['u_name'];
    $address = $item['u_address'];
    $phone = $item['u_phone'];
    $email = $item['u_email'];
    Database::disconnect();
} else {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo @$_SESSION['Titulo']; ?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
        <script src="js/perfil.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
                        <div class="login-name">
                <?php
                if ($name) {
                    ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i> Mi Perfil &nbsp;&nbsp;
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a type="button"  href="index.php"> <i class="glyphicon glyphicon-home"></i> Inicio</a></li>       
                            <li><a type="button"  href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">INFORMACION PERSONAL</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class=" col-md-12"> 
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>NOMBRE:</td>
                                                <td><?php echo $name; ?></td>
                                            </tr>
                                            <tr>
                                                <td>DIRECCION:</td>
                                                <td><?php echo $address; ?></td>
                                            </tr>

                                            <tr>

                                            <tr>
                                                <td>Email</td>
                                                <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                            </tr>
                                            <tr>
                                                <td>NUMERO TELEFONICO:</td>
                                                <td><?php echo $phone; ?>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <a href="#" class="btn btn-primary">Actualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">CAMBIO CONTRASEÑA</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class=" col-md-12"> 
                                    <form id="frmRestablecer" method="post">
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>Nueva Contraseña:</td>
                                                <td><input type="password" class="form-control input-lg" name="password1" id="password1" required></td>
                                            </tr>
                                            <tr>
                                                <td>Confirmar Nueva Contraseña:</td>
                                                <td><input type="password" class="form-control input-lg" name="password2" id="password2" required></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <p><button type="submit" class="btn btn-primary">Cambiar Contraseña</button></p>
                                    </form>
                                    <p><a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>