<?php
session_start();

if ((@$_SESSION['is_auth'] == '')) {
	
       @$user = 'Bienviendo '. $_SESSION['name'];

}
else{
    header("location:index.php");
       
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo @$_SESSION['Titulo']; ?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/reset.js"></script>
    </head>


    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <section class="login-form">
            <form id="frmRestablecer" method="post" role="login">
                <div>
                    <h4>Restaurar contraseña</h4>
                </div>			
                <input type="email" id="email" placeholder="Email" class="form-control input-lg" name="email" required>
                <button type="submit" name="login-submit" id="login-submit" class="btn btn-lg btn-block btn-info" title="Login now">Recuperar contraseña</button>
            </form>
        </section>

        <div id="mensaje"></div>
    </body>
</html>