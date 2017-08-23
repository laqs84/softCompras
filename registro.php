<?php
session_start();
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
        <script src="js/registro.js"></script>
    </head>


    <body>
        <?php
        @$error = $_GET['error'];
        if (isset($error)) {
            echo "<div class='errormsg'>$error</div>";
        }
        ?>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <section class="login-form">
            <form class="form-horizontal" role="login" method="POST" action="crearusuario.php">
                <div>
                    <h4>Registro del usuario</h4>
                </div>
                <input id="name" name="name" type="text" placeholder="Apodo (Username)" class="form-control input-lg" required="">
                <input id="password" name="password" type="password" placeholder="Password" class="form-control input-lg" required="">
                <input id="telefono" name="telefono" type="text" placeholder="Telefono" class="form-control input-lg" required="">
                <input id="direccion" name="direccion" type="text" placeholder="Direccion" class="form-control input-lg" required="">
                <input id="email" name="email" type="text" placeholder="Email" class="form-control input-lg" required=""><div id="resultado"></div>
                <input id="level" name="level" type="hidden" class="form-control input-lg" value="2">
                <button name="login-submit" id="login-submit" class="btn btn-lg btn-block btn-info">Enviar</button>
            </form>
        </section>
    </body>
</html>