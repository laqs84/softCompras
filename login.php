<?php
session_start();

if ((@$_SESSION['is_auth'] == '')) {

    @$user = 'Bienviendo ' . $_SESSION['name'];
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
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/login.js"></script>
        <?php
        @$error = $_GET['error'];
        if (isset($error)) { 
        ?>
            <script>
            $( document ).ready(function() {
        $("#myModal").modal('show');    
        $("#myModal").modal({          
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     
    });
    
    $("#myModal").on("hidden", function() {  
        $("#myModal").remove();
    });
    
    
    $('#myModal').on('hidden.bs.modal', function (e) {
        
    });
    $( ".closealert" ).click(function() {
  $("#myModal").modal('hide');     
});

});
            </script>
        <?php
        }
        ?>
    </head>


    <body>

        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <?php echo @$_SESSION['Titulo']; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
        <section class="login-form">
            <form method="post" action="validar.php" role="login">
                <div>
                    <h4>Login</h4>
                </div>			
                <input type="email" name="emailaddress" id="emailaddress" placeholder="Email" required class="form-control input-lg" />
                <input type="password" name="pass" id="pass" placeholder="Password" required class="form-control input-lg" />

                <button type="submit" name="login-submit" id="login-submit" class="btn btn-lg btn-block btn-info" title="Login now">Entrar</button>
                <div>
                    <a href="registro.php">Crear cuenta</a> o <a href="reset.php">Resetar password</a>
                </div>
            </form>
        </section>
        
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- dialog body -->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <div class="mensaje"><?php echo $error; ?></div>

                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><button type="button" class="btn closealert btn-primary">OK</button></div>
                </div>
            </div>
        </div> 
    </body>
</html>