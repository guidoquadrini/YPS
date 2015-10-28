<?php $img = base_url('assets/images/views/login/'); ?>
<?php $css = base_url('assets/styles/views/login/'); ?>
<?php $js = base_url('assets/scripts/views/login/'); ?>
<?php $base = base_url('/login/'); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title>Signin Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $css . '/bootstrap.min.css'; ?>" rel="stylesheet">    
        <!-- Custom styles for this template -->
        <link href="<?php echo $css . '/signin.css'; ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $css . '/login.css'; ?>" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Librerias JavaScript -->
        <script type="text/javascript" src="<?php echo $js . '/instanciaAjax.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $js . '/funcionesJS.js'; ?>"></script>


    </head>
    <body>
        <div class="pagina">
            <div class="header">
                <div class="logo"><img src="<?php echo $img . '/yps_logo_iso.jpg'; ?>"/></div>

                <div class="publi">Publicidad Propia</div>
                <div class="titulo">
                    <h1>Yerpa Pro Salud</h1>
                    <h2>Asistente para Profesionales de la Salud</h2>
                </div>

            </div>
            <div class="faja">
            </div>
            <div class="footer">    
                <div class="container">
                    <form action="<?php echo base_url('users/login');?>" 
                          method="post" accept-charset="utf-8" 
                          id='login_form' class="form-signin" 
                          style="background:white; margin-top: 25px; 
                            box-shadow: 0em 0em 10em black;" 
                          role="form">
                        <div style="display:none">
                            <input type="hidden" name="login" value="1" />
                        </div><fieldset>
                            <div id="form_nuevo">
                                <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Iniciar Sesion</legend>
                                <!--h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Iniciar Sesion<hr></h2-->
                               
                                    <?php echo form_label($this->lang->line('yps_general_label_user'), 'user'); ?>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <?=
                                    form_input([
                                        'id' => 'user',
                                        'name' => 'user',
                                        'maxlength' => 30,
                                        'placeholder' => $this->lang->line('yps_general_placeholder_user'),
                                        'class' => 'form-control',
                                            ], set_value('user'), 'required', 'autofocus');
                                    ?>
                                </div>
                                <?php echo form_error('user'); ?>
                                                               <br>
                                    <?php echo form_label($this->lang->line('yps_general_label_password'), 'password'); ?>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <?php echo
                                    form_password([
                                        'id' => 'password',
                                        'name' => 'password',
                                        'maxlength' => 30,
                                        'placeholder' => $this->lang->line('yps_general_placeholder_password'),
                                        'class' => 'form-control'
                                            ], '', 'required')
                                    ?>
                                </div>
                                <?php echo form_error('password'); ?>
                                <br>
                           
                                <!--label class="checkbox">
                                    <input type="checkbox" value="remember-me"> Recordarme
                                </label-->
                                <?=
                                form_button([
                                    'content' => '<span class="glyphicon glyphicon-log-in"></span> ' . $this->lang->line('yps_general_label_button_access'),
                                    'type' => 'submit',
                                    'class' => 'btn btn-lg btn-primary btn-block'
                                ])
                                ?>
                            </div>
                        </fieldset>
                    </form>
                </div> <!-- /container -->    
                <div class="box-error">
                    <img src="<?php echo $img . '/closebox.png'; ?>" onclick="toggle_mensaje()" alt="Cerrar Ventana" Title="Boton Cerrar Mensaje"/><span id="mensaje"><div class="error"></div><?php echo validation_errors(); ?></span>
                </div>
            </div>
            <div class="copyright">Todos los derechos reservados a <a href="#"><img src="<?php echo $img . '/logo_copy.png'; ?>" style="vertical-align: middle; height: 30px;" alt="Q-Informatica" title="Todos los derechos reservados a Q-Informatica"/></a></div>
        </div>
    </body>
</html>
