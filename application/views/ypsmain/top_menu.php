<?php $img = base_url() . 'assets/images/views/top_menu/'; ?>
<?php $css = base_url() . 'assets/styles/views/top_menu/'; ?>
<?php $js = base_url() . 'assets/scripts/views/top_menu/'; ?>
<?php $base = base_url() . 'index.php/top_menu/'; ?>

<!-- Inicia Menu TOP -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">                
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigator</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img style=" height: 35px;padding: 1px;" src="<?php echo $img . 'logo.png'; ?>"/>Yerpa Pro Salud</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        if ($role == 2){?>
                        <li class="active"><a href="#">Configuracion</a></li>    
                        <?php }?>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ayuda <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Manual de Ayuda</a></li>
                            </ul>
                        </li>
                    </ul>
<?php
                        if ($role == 2){?>
                        <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" id="inputBuscarMenu" class="form-control"  placeholder="Ingrese Cod. Menu" >
                        </div>
                        <button type="button" id="buscarMenu" class="btn btn-default">Ir</button>
                    </form> 
                        <?php }?>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a ><?php echo $name;?></a></li>
                        <li class="dropdown">
                            <?php echo anchor('users/logout', 'Cerrar Session');?>                            
                        </li>
                    </ul>
                </div> 
            </div>
        </nav>
    <!-- Fin Menu TOP -->