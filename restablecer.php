<?php
session_start();
if ((@$_SESSION['is_auth'] == '')) {
	
       @$user = 'Bienviendo '. $_SESSION['name'];

}
else{
    header("location:index.php");
       
}
$token = $_GET['token'];
$idusuario = $_GET['u_id'];

require 'database.php';

$sql = "SELECT * FROM tblreseteopass WHERE token = '$token'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    $user = sha1($usuario['u_id']);
    if ($user == $idusuario) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title><?php echo @$_SESSION['Titulo']; ?></title>
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="css/styles.css">
            </head>

            <body>
                <div class="container" role="main">
                    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
                    <section class="login-form">
                        <form action="cambiarpassword.php" method="post" role="login">
                            <div>
                                <h4>Cambio de la contraseña</h4>
                            </div>
                            <input type="password" placeholder="Nueva contraseña" class="form-control input-lg" name="password1" required>
                            <input type="password" placeholder="Confirmar contraseña" class="form-control input-lg" name="password2" required>
                            <input type="hidden" name="token" value="<?php echo $token ?>">
                            <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                            <button id="login-submit" type="submit" class="btn btn-lg btn-block btn-info" >Recuperar contraseña</button>
                        </form>
                    </section>
                </div> <!-- /container -->
            </body>
        </html>
        <?php
    } else {
        header('Location:login.php');
    }
} else {
    header('Location:login.php');
}
?>