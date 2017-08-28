<div class="login-name site">
    <div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <?php
            if($user){echo $user;}
            ?> 
              <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    
            <li><a type="button"  href="../"> <i class="glyphicon glyphicon-home"></i> Sitio</a></li>
            <li><a type="button"  href="../perfil.php?id=<?php echo $_SESSION['user_id'];?>"> <i class="glyphicon glyphicon-user"></i> Perfil</a></li>
            <li><a type="button"  href="../logout.php"> <i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
	  </ul>
    </div>
    
</div>
<nav class="menuadmin2">
    <ul class="nav nav-pills">
        <li class="products site"><a href="index.php">Productos</a></li>
        <li class="categories site"><a href="categories.php">Categorias</a></li>
        <li class="user site"><a href="user.php">Usuarios</a></li>
        <li class="site promotions"><a href="promotions.php">Promociones</a></li
    </ul>
</nav>
