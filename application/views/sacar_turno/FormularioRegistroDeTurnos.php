<?php $def = 'sacar_turno'; ?>
<?php $img = base_url() . 'assets/images/views/' . $def . '/'; ?>
<?php $css = base_url() . 'assets/styles/views/' . $def . '/'; ?>
<?php $js = base_url() . 'assets/scripts/views/' . $def . '/'; ?>
<?php $base = base_url() . 'index.php/' . $def . '/'; ?>
<?php $base_cal = base_url() . 'assets/fullcalendar/'; ?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<form action="http://localhost/yps/index.php/users/login" method="post"       
      accept-charset="utf-8" id='login_form' class="form-signin" 
      style="background:white; margin-top: 25px; box-shadow: 0em 0em 10em black;
      width:350px; margin: 50px auto; padding:20px;" 
      role="form">
    <img style="float:left;padding-right:15px;" src="<?php echo $img . 'botiquin.jpg'?>">
    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
    <fieldset>
        <div id="form_nuevo">
            <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Datos del Turno:</legend>


            <?php echo form_label('Profesional:', 'cbo_profesional'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <?php
                $options = [
                    '0' => 'OSDE BINARIO',
                    '1' => 'FEDERADA SALUD',
                    '2' => 'Medife',
                    '3' => 'Contado Efectivo'
                ];
                echo form_dropdown('cbo_obra_social', $options, '0', 'class="form-control" autofocus');
                ?>
            </div>
            <?php echo form_error('cbo_obra_social'); ?>
            <br>
            <?php echo form_label('ObraSocial:', 'lbl_obra_social'); ?>
            <div class="input-group">

                <input class="form-control" type="text" id="lbl_obra_social" value="Fecha del turno" disabled/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

            </div>
            <br> 
            <?php echo form_label('Hora del Turno:', 'lbl_hora_turno'); ?>
            <div class="input-group">

                <input class="form-control" type="text" value="Hora del turno" disabled/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            </div>
            <br> 
            <div style="float:right;">
                <?=
                form_button('btn_cancelar', 'Cancelar', 'class="btn btn-lg btn-danger" onclick="window.history.back(-1)"')
                ?>
                <?=
                form_button([
                    'content' => 'Guardar',
                    'type' => 'submit',
                    'class' => 'btn btn-lg btn-primary'
                ])
                ?>
            </div>
        </div>
    </fieldset>
</form>
