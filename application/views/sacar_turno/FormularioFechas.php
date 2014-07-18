<?php $def = 'sacar_turno'; ?>
<?php $img = base_url() . 'assets/images/views/' . $def . '/'; ?>
<?php $css = base_url() . 'assets/styles/views/' . $def . '/'; ?>
<?php $js = base_url() . 'assets/scripts/views/' . $def . '/'; ?>
<?php $base = base_url() . 'index.php/' . $def . '/'; ?>
<html>
    <link href="<?php echo $css . 'bootstrap.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
          href="<?php echo $css . 'datepicker3.css'; ?>">
    <script src="<?php echo $js . 'jquery-2.1.1.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $js . 'bootstrap.js' ?>"></script>
    <body style="¨position:absolute;">
        <div class="container-fluid">
            <div class="row">
                <form action="http://localhost/yps/index.php/sacar_turno" method="post"       
                      accept-charset="utf-8" class="form-signin" 
                      style="background:white; margin-top: 25px; box-shadow: 0em 0em 10em black;
                      width:350px; margin: 50px auto; padding:20px;" 
                      role="form" name="frm_profesioanels" id="frm_profesionales">
                    <img style="float:left;padding-right:15px;" src="<?php echo $img . 'botiquin.jpg' ?>">
                    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
                    <fieldset>
                        <div id="form_nuevo">
                            <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Seleccione una fecha deseada:</legend>
                            <?= form_label('Fecha del Turno:', 'cbo_fecha'); ?>
                            <div><input id="input_fecha_turno" style="width:100%;" type="date"/></div>
                        </div> 
                        <?php echo form_error('cbo_fechas'); ?>
                        <br>            
                        <div style="float:right;">
                            <input type="hidden"  id="estado" name="estado"/>
                            <input type="button"  class="btn btn-lg btn-danger"  value="Volver"   id="btn_volver" />
                            <input type="button"  class="btn btn-lg btn-danger"  value="Cancelar" id="btn_cancelar"/>
                            <input type="button"  class="btn btn-lg btn-primary" value="Aceptar"  id="btn_guardar" disabled/>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {

                $("#input_fecha_turno").on('change', function() {
                    $("#btn_guardar").removeAttr("disabled");
                });

                $("#btn_guardar").click(function() {
                    estado(2);
                    $("#frm_profesionales").submit();
                });

                $("#btn_volver").click(function() {
                    estado(0);
                    $("#frm_profesionales").submit();
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

    </body>
</html>

