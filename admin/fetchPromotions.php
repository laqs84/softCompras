<?php

require 'database.php';
$db = Database::connect();

$statement = $db->query('SELECT * FROM `promociones`');



$output = array('data' => array());

while ($row = $statement->fetch()) {
    $promotionsId = $row[0];
    $hoy=date("Y-m-d");
    if ($row[5]<$hoy){
        $row[5] = $row[5].' <span style="color:red;">Cambie la fecha final por una fecha mayor que hoy </span>';
    }
    $products = "";
    $var = explode(',', $row[2]);
    foreach ($var as $row2) {

        if ($row2 != "" && !empty($row2)) {
            $statementp = $db->query('SELECT * FROM products WHERE p_id =' . $row2);
            
            while ($rowp = $statementp->fetch()) {
                $products .= '<a type="button" href="view.php?id=' . $rowp['p_id'] . '"> <i class="glyphicon glyphicon-info"></i>' . $rowp['p_name'] . '</a> - ';
            }
        }//
    } // /for 



    $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" id="editPromotionsModalBtn" href="editPromotions.php?id=' . $promotionsId . '"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button"  id="removePromotionsModalBtn" href="removePromotions.php?id=' . $promotionsId . '"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

    $output['data'][] = array(
        $row[1],
        $products,
        $row[3],
        $row[4],
        $row[5],
        $button
    );
} // /while 


Database::disconnect();

echo json_encode($output);
exit();
