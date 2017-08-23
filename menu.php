<?php
    echo '<nav>
            <ul class="nav nav-pills">';
            $db = Database::connect();
            $statement = $db->query('SELECT * FROM categories');
            $categories = $statement->fetchAll();
            foreach ($categories as $category) 
            {
                if($category['id'] == '1')
                    echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                else
                    echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
            }

            echo    '</ul>
    </nav>';
            
?>