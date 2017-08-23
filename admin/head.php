<?php

session_start();

if (isset($_SESSION["is_auth"]) && $_SESSION["user_level"] == 1) {
	$user = 'Bienviendo '. $_SESSION['name'];

}
else{
       $user = FALSE;
       header("location:../index.php");
}

?>
        <title><?php echo @$_SESSION['Titulo']; ?></title>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <!-- DataTables -->
        <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">
	<script src="assests/plugins/datatables/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="../css/styles.css">

        
        