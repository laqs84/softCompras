<?php 	

require 'database.php';

    if(!empty($_GET)) 
    {
        $id = checkInput($_GET['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM categories WHERE id = ?");
        $statement->execute(array($id));
        
        Database::disconnect();
        header("Location: categories.php"); 
    }
    
            function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }