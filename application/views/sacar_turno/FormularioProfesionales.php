<?php $def = 'sacar_turno'; ?>
<?php $img = base_url() . 'assets/images/views/' . $def . '/'; ?>
<?php $css = base_url() . 'assets/styles/views/' . $def . '/'; ?>
<?php $js = base_url() . 'assets/scripts/views/' . $def . '/'; ?>
<?php $base = base_url() . 'index.php/' . $def . '/'; ?>
<?php $base_cal = base_url() . 'assets/fullcalendar/'; ?>

<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
<link  href="<?php echo $css . 'bootstrap.css'; ?>" rel="stylesheet">
<!-- Optional theme -->
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">-->
<!-- Latest compiled and minified JavaScript -->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<script src="<?php echo $js . 'jquery-2.1.1.js'; ?>"></script>

<script src="<?php echo $js . 'bootstrap.min.js'; ?>"></script>

<form action="http://localhost/yps/index.php/sacar_turno/" method="post"       
      accept-charset="utf-8"  class="form-signin" 
      style="background:white; margin-top: 25px; box-shadow: 0em 0em 10em black;
      width:350px; margin: 50px auto; padding:20px;" 
      role="form" name="frm_profesioanels" id="frm_profesionales">
    <!--img style="float:left;padding-right:15px;" src="<!?php echo $img . 'botiquin.jpg' ?>">-->
    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
    <fieldset>
        <div id="form_nuevo">
            <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Seleccione un Profesional:</legend>
            <?php echo form_label('Profesional:', 'cbo_profesional'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <?php
                foreach ($data_vista as $pro) {
                    $options[$pro->idProfesional] = $pro->nombre . " " . $pro->apellido;
                }
                echo form_dropdown('cbo_profesional', $options, '', 'class="form-control"');
                ?>
            </div>
            <br>            
            <div style="float:right;">
                <input type="hidden"  id="estado" name="estado"/>

                <input type="button"  class="btn btn-lg btn-danger" value="Cancelar" onclick="window.location = ('sacar_turno')"/>
                <input type="button"  class="btn btn-lg btn-primary" value="Aceptar" id="btn_guardar"/>
                <script>
                    $(document).ready(function(){
                    $("#btn_guardar").click(function() {                      
                        $("#estado").val("1");
                        $("#frm_profesionales").submit()
                    });                    
                });
                </script>
            </div>
        </div>
    </fieldset>
</form>  
