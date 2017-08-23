<?php 	

require 'database.php';
$db = Database::connect();

$statement = $db->query('SELECT * from users');



$output = array('data' => array());

while($row = $statement->fetch()) {
 	$userId = $row[0];
        if($row[6] == 1){
           $level = "Administrador"; 
        }
        else {
           $level = "Cliente"; 
        }

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" href="userupdate.php?id=' . $userId . '"><i class="glyphicon glyphicon-edit"></i> Editar</li>
	    <li><a type="button" href="userdelete.php?id=' . $userId . '"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1],
                $row[3],
                $row[4],
                $row[5],
                $level,
 		$button 		
 		); 	
 } // /while 


Database::disconnect();

echo json_encode($output);
exit();