<?php 	

require 'database.php';
$db = Database::connect();

$statement = $db->query('SELECT `id`, `name` FROM `categories`');



$output = array('data' => array());

while($row = $statement->fetch()) {
 	$categoriesId = $row[0];


 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" id="editCategoriesModalBtn" href="editCategories.php?id='.$categoriesId.'"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button"  id="removeCategoriesModalBtn" href="removeCategories.php?id='.$categoriesId.'"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 	
 		$button 		
 		); 	
 } // /while 


Database::disconnect();

echo json_encode($output);
exit();