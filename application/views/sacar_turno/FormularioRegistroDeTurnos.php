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
<script src="<?php echo $base_cal . 'lib/jquery.min.js' ?>"></script>
<script src="<?php echo $base_cal . 'lib/jquery-ui.custom.min.js' ?>"></script>
<script src="<?php echo $js . 'bootstrap.min.js'; ?>"></script>
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<form action="http://localhost/yps/index.php/sacar_turno" method="post"       
      accept-charset="utf-8" role="form" name="frm_registro" id="frm_registro" 
      style="background:white; margin-top: 25px; box-shadow: 0em 0em 10em black;
      width:350px; margin: 50px auto; padding:20px;"    >
    <img style="float:left;padding-right:15px;" src="<?php echo $img . 'botiquin.jpg' ?>">
    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
    <fieldset>
        <div id="form_nuevo">
            <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Datos del Turno:</legend>


            <?php echo form_label('Profesional:', 'lbl_profesional'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input class="form-control" type="text" id="lbl_profesional" value="<?= $profesional->nombre . " " . $profesional->apellido; ?>" disabled/>
            </div>
            <br>
            <?php echo form_label('Paciente:', 'lbl_paciente'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input class="form-control" type="text" id="input_paciente" value="<?= $paciente->nombre . " " . $paciente->apellido; ?>" disabled/>
            </div>
            <br>
            <?php echo form_label('ObraSocial:', 'lbl_obra_social'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                <?php
                foreach ($obras_sociales as $os)
                {
                    $options[$os->IdObraSocial] = $os->Nombre;
                }
                echo form_dropdown('cbo_obra_social', $options, $id_ultima_obra_social, 'class="form-control" autofocus');
                ?>                


            </div>
            <br> 
            <?php echo form_label('Hora del Turno:', 'lbl_hora_turno'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                <input class="form-control" type="text" value="<?= $fecha_turno; ?>" disabled/>

            </div>
            <br> 
            <div style="float:right;">
                <input type="hidden"  id="estado" name="estado"/>

                <input type="button"  class="btn btn-lg btn-danger"  value="Volver"   id="btn_volver" />
                <input type="button"  class="btn btn-lg btn-danger"  value="Cancelar" id="btn_cancelar"/>
                <input type="button"  class="btn btn-lg btn-primary" value="Aceptar"  id="btn_guardar"/>
                <script>
                    $(document).ready(function() {

                        $("#btn_guardar").click(function() {
                            estado(4);
                            $("#frm_registro").submit();
                        });

                        $("#btn_volver").click(function() {
                            estado(2);
                            $("#frm_registro").submit();
                        });

                        $("#btn_cancelar").click(function() {
                            estado(0);
                            window.location = '../../index.php';
                        });
                    });
                    function estado(estado) {
                        $("#estado").val(estado);
                    }

                </script>
            </div>
        </div>
    </fieldset>
</form>
