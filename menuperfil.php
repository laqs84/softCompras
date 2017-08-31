            <div class="login-name">
                <?php
                if ($user) {
                    ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            echo $user;
                            ?> 
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION["user_level"] == 1) {?>
                            <li><a type="button"  href="admin/"> <i class="glyphicon glyphicon-apple"></i> Administrador</a></li>
                            <?php } else { ?>
                            <li><a type="button"  href="home/index.php?id=<?php echo $_SESSION['user_id']; ?>"> <i class="glyphicon glyphicon-apple"></i> Cuenta</a></li>
                            <?php } ?>
                            <li><a type="button"  href="perfil.php?id=<?php echo $_SESSION['user_id']; ?>"> <i class="glyphicon glyphicon-user"></i> Perfil</a></li>       
                            <li><a type="button"  href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                        </ul>
                    </div>
                    <?php
                } else {
                    ?> 
                    <a href="login.php">Entrar a Comprar</a>
                    <?php
                }
                ?>
                 
                <div id="cart">
               <!--<img src="img/cart.png">-->
                    <div class="producto">
                        <p class="nombre"></p>
                        <p class="cantidad"></p>
                        <p class="precio"></p>
                        <p class="delete"></p>
                    </div>
                </div>

            </div>
