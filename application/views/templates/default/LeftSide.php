<!-- Left side column. contains the logo and sidebar -->
<?php
//Datos de Testing
//$_usuario_activo['url_photo'] = 'assets/images/templates/default/user2-160x160.jpg';
//$_usuario_activo['nombre_corto'] = 'Ing. Guido Q.';
//$_usuario_activo['estado'] = 'Online';
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $user = $_usuario_activo->magic('user');
                $user = strtoupper(substr($user, 0, 1)) . substr($user, 1, strlen($user));
                ?>
                <img src="<?= $_usuario_activo->magic('persona')->magic('fotoURL'); ?>" class="img-circle" alt="<?= $user; ?>">
            </div>
            <div class="pull-left info">
                <p><?= $user;?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> <?= 'Disponible';//$_usuario_activo->magic('status'); ?></a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form name='frm_busqueda' class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Resaltador...">
                <span class="input-group-btn">
                    <button type='button' name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->        
        <?= $_menu; ?>
        <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
</aside>

