<?php
foreach ($categories as $category) 
{

    if($category['id'] == '1')
        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
    else
        echo '<div class="tab-pane" id="' . $category['id'] .'">';

    echo '<div class="row">';

    $statement = $db->prepare('SELECT * FROM products WHERE p_category = ?');

    $statement->execute(array($category['id']));

    while ($item = $statement->fetch()) 
    {
    ?>
        <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="images/<?php echo  $item['p_image']; ?>" alt="...">
                    <div class="price">₡ <?php echo number_format($item['p_price'], 2, '.', '') ?> </div>
                    <div class="caption">
                        <h4><?php echo $item['p_name'] ?></h4>
                        <p><?php echo $item['p_description'] ?></p>
                        <p>Cantidad<input type="text" id="cantidad_<?php echo $item['p_id'] ?>" name="cantidad"></p>
                        <?php if(isset($_SESSION["is_auth"])){ ?>
                        <a class="btn btn-order" role="button" onclick="addtocart('<?php echo $item['p_name']?>', '<?php echo number_format($item['p_price'], 2, '.', '')?>', '<?php echo $item['p_id']?>');"><span class="glyphicon glyphicon-shopping-cart"></span>Ordenar</a>
                        <?php } else {?>
                        <a class="btn btn-order sinacceso" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span>Ordenar</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
    }

   echo    '</div>
        </div>';
}
?>