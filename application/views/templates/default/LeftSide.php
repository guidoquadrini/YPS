<!-- Left side column. contains the logo and sidebar -->
<?php //Datos de Testing
$_usuario_activo['url_photo'] = 'assets/images/templates/default/user2-160x160.jpg';
$_usuario_activo['nombre_corto'] = 'Ing. Guido Q.';
$_usuario_activo['estado'] = 'Online';
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $_usuario_activo['url_photo']; ?>" class="img-circle" alt="<?= $_usuario_activo['nombre_corto']; ?>">
            </div>
            <div class="pull-left info">
                <p><?= $_usuario_activo['nombre_corto']; ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> <?= $_usuario_activo['estado']; ?></a>
            </div>
        </div>
        
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar menú...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->        
        <?=$_menu;?>
        <!-- /.sidebar-menu -->
        
    </section>
    <!-- /.sidebar -->
</aside>

