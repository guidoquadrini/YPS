<?php $def = 'sacar_turno'; ?>
<?php $img = base_url() . 'assets/images/views/' . $def . '/'; ?>
<?php $css = base_url() . 'assets/styles/views/' . $def . '/'; ?>
<?php $js = base_url() . 'assets/scripts/views/' . $def . '/'; ?>
<?php $base = base_url() . 'index.php/' . $def . '/'; ?>
<html>
    <link href="<?php echo $css . 'bootstrap.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
          href="<?php echo $css . 'datepicker3.css'; ?>">

    <body style="¨position:absolute;">
        <div class="container-fluid">
            <div class="row">
                <form action="http://localhost/yps/index.php/users/login" method="post"       
                      accept-charset="utf-8" id='login_form' class="form-signin" 
                      style="background:white; margin-top: 25px; box-shadow: 0em 0em 10em black;
                      width:350px; margin: 50px auto; padding:20px;" 
                      role="form">
                    <img style="float:left;padding-right:15px;" src="<?php echo $img . 'botiquin.jpg' ?>">
                    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
                    <fieldset>
                        <div id="form_nuevo">
                            <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Seleccione una fecha deseada:</legend>
                            <?= form_label('Fecha del Turno:', 'cbo_fecha'); ?>
                            <div> 
                                <input STYLE="width:100%;" type="date"/>                            </div>
                        </div>  

                        <?php echo form_error('cbo_fechas'); ?>




                        <br>            
                        <div style="float:right;">
                            <?=
                            form_button('btn_cancelar', 'Cancelar', 'class="btn btn-lg btn-danger" onclick="window.location=\'/yps/index.php\'"')
                            ?>
                                            <input type="button"  class="btn btn-lg btn-primary" value="Aceptar" onclick="window.location=('/sacar_turno/frm_grilla')"/>

                            <!--?=
                            form_button([
                                'content' => 'Aceptar',
                                'type' => 'submit',
                                'class' => 'btn btn-lg btn-primary'
                            ])
                            ?-->
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body></html>
<script type="text/javascript" src="<?php echo $js . 'jquery-1.11.0.min.js' ?>"></script>
<script type="text/javascript"        src="<?php echo $js . 'bootstrap.js' ?>"></script>
