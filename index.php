<?php
session_start();

require 'admin/database.php';
$pdo = Database::connect();
$config = $pdo->prepare('SELECT * FROM configuration');
$config->execute();
$configuration = $config->fetch();

if ($configuration['key'] == "Titulo") {
    $_SESSION['Titulo'] = $configuration['text'];
}


if (isset($_SESSION["is_auth"])) {
    $user = 'Bienviendo ' . $_SESSION['name'];
} else {
    $user = FALSE;
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
        <script src="js/cart.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
    </head>


    <body>
        <div id="loadingDiv">
            <div>
                <h7>Por favor espere...</h7>
            </div>
        </div>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- dialog body -->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <?php if (isset($_SESSION["is_auth"])) { ?>
                            <div class="mensaje">Ingrese una cantidad, por favor!</div>
                        <?php } else { ?>
                            <div class="mensaje">Ingrese como usuario para comprar, por favor!</div>
                        <?php } ?>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><button type="button" class="btn closealert btn-primary">OK</button></div>
                </div>
            </div>
        </div>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
            <div class="login-name">
                <?php
                if ($user) {
                    ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            echo $user;
                            ?> 
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a type="button"  href="perfil.php?id=<?php echo $_SESSION['user_id']; ?>"> <i class="glyphicon glyphicon-user"></i> Perfil</a></li>       
                            <li><a type="button"  href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                        </ul>
                    </div>
                    <?php
                } else {
                    ?> 
                    <a href="login.php">Entrar a Comprar</a>
                    <?php
                }
                ?>
                <div id="cart">
               <!--<img src="img/cart.png">-->
                    <div class="producto">
                        <p class="nombre"></p>
                        <p class="cantidad"></p>
                        <p class="precio"></p>
                        <p class="delete"></p>
                    </div>
                </div>

            </div>
            <?php include 'menu.php'; ?>
            <div class="tab-content">
                <?php include 'listaproducts.php'; ?>  
            </div>
            <?php
            Database::disconnect();
            ?>
        </div>
    </body>
</html>

