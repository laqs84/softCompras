<?php 	

require 'database.php';
$db = Database::connect();

$statement = $db->query('SELECT products.p_id, products.p_name, products.p_description, products.p_price, categories.name AS category FROM products LEFT JOIN categories ON products.p_category = categories.id ORDER BY products.p_id DESC');



$output = array('data' => array());

while($row = $statement->fetch()) {
 	$productId = $row[0];


 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" href="update.php?id=' . $productId . '"><i class="glyphicon glyphicon-edit"></i> Editar</li>
	    <li><a type="button" href="delete.php?id=' . $productId . '"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1],
                $row[2],
                $row[3],
                $row[4],
 		$button 		
 		); 	
 } // /while 


Database::disconnect();

echo json_encode($output);
exit();