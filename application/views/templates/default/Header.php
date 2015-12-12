<?php
$configuracion = [
    'notificaciones' => false,
    'mensajes' => false,
    'tareas' => false,
    'usuario' => false,
    'config-panel' => false
];
$user['name'] = 'Ing. Guido Nicolas Quadrini';
$app_name = 'Yerpa Pro Salud';
$mensajes_pendientes = 0;
$notificaciones = [1, 2];
$tareas = [1, 2];
$limite = 3; #limite de mostrar notificaciones
?>


<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?= $app_name; ?></b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Cambiar la navegación</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if ($configuracion['mensajes']){?>
                <!-- Messages: style can be found in dropdown.less-->                
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?= $mensajes_pendientes ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tenes <?= $mensajes_pendientes; ?> mensajes</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <?php
                                foreach ($mensajes as $mensaje) {
                                    #<!-- start message -->
                                    echo '<li><a href="' . $mensaje->link() . '">';
                                    echo '<div class="pull-left">';
                                    #<!-- User Image -->
                                    echo '<img src="' . $mensaje->fromImagen . '" class="img-circle" alt="User Image">';
                                    echo '</div>';
                                    #<!-- Message title and timestamp -->
                                    echo '<h4>';
                                    echo $mensaje->from;
                                    echo '<small><i class="fa fa-clock-o"></i>';
                                    echo $mensaje->timeToNow;
                                    echo '</small></h4>';
                                    #<!-- The message -->
                                    echo '<p>';
                                    echo $mensaje->mensaje;
                                    echo '</p></a></li>';
                                    #<!-- end message -->
                                }
                                ?>

                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#" onclick="verTodos('mensajes');">Ver todos los mensajes</a></li>
                    </ul>
                </li><!-- /.messages-menu -->
                <?php } ?>
                <?php if ($configuracion['notificaciones']){?>
                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?= count($notificaciones); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Usted tiene <?= count($notificaciones); ?> notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <?php
                                $count = 0;
                                foreach ($notificaiones as $notificacion) {
                                    $count++;
                                    $mostrar = ($count < $limite) ? true : false;
                                    echo '<li';
                                    echo 'style="visivility:';
                                    echo $mostrar ? 'visible' : 'hidden';
                                    echo '">'; #<!-- start notification -->
                                    echo '<a href="' . $notificaion->link . '">';
                                    echo '<i class="fa fa-users text-aqua"></i>';
                                    echo $notificacion->mensaje;
                                    echo '</a></li>'; #<!-- end notification -->                               
                                }
                                ?>

                            </ul>
                        </li>
                        <li class="footer"><a href="#" onclick="verTodos('notificaciones');">Ver todo</a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($configuracion['tareas']){?>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger"><?= count($tareas); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tenés <?= count($tareas); ?> tareas</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <?php
                                foreach ($tareas as $tarea) {

                                    echo '<li>'; #<!-- Task item -->
                                    echo '    <a href="#">';
                                    #<!-- Task title and progress text -->
                                    echo '        <h3>';
                                    echo $tarea->mensaje;
                                    echo '            <small class="pull-right">';
                                    echo $tarea->completatud;
                                    echo '</small>';
                                    echo '        </h3>';
                                    #<!-- The progress bar -->
                                    echo '        <div class="progress xs">';
                                    #<!-- Change the css width attribute to simulate progress -->
                                    echo '<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">';
                                    echo '<span class="sr-only">' . $tarea->completud . '% Complete</span>';
                                    echo '            </div></div></a>';
                                    echo '</li>'; #<!-- end task item -->                                
                                }
                                ?>

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">Ver todas las tareas</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($configuracion['usuario']){ ?>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="assets/images/templates/default/user2-160x160.jpg" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?= $user['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="assets/images/templates/default/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $user['name']; ?> - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Seguidores</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Ventas</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Amigos</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat"><?php echo anchor('users/logout', 'Cerrar Session'); ?></a>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($configuracion['config-panel']){ ?>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>

