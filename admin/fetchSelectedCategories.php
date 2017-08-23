<?php 	

require 'database.php';

$categoriesId = $_POST['categoriesId'];

$output = array('data' => array());

$db = Database::connect();

$statement = $db->query('SELECT `id`, `name` FROM `categories` WHERE `id` ='.$categoriesId);


while($row = $statement->fetch()) {
 	$output['data'][] = array( 		
 		$row[0], 	
 		$row[1]		
 		); 	
 } // /while 

echo json_encode($output);

$Database::disconnect();