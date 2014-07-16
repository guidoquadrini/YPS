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
    <!--img style="float:left;padding-right:15px;" src="<!?php echo $img . 'botiquin.jpg' ?>">-->
    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
    <fieldset>
        <div id="form_nuevo">
            <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Seleccione un Profesional:</legend>


            <?php echo form_label('Profesional:', 'cbo_profesional'); ?>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <?php
                $options = [
                    '0' => 'Lic Mariana Zucchi Araujo',
                    '1' => 'Lic. Maria Enriqueta Quadrini',
                    '2' => 'Psic. Laura Berizzo',
                    '3' => 'Psic. Maria Belen Futch'
                ];
                echo form_dropdown('cbo_profesional', $options, '0', 'class="form-control"');
                ?>
            </div>
            <?php echo form_error('user'); ?>
            <br>            
            <div style="float:right;">
                <?=
                form_button('btn_cancelar', 'Cancelar', 'class="btn btn-lg btn-danger" onclick="window.history.back(-1)"')
                ?>
                
                <input type="button"  class="btn btn-lg btn-primary" value="Aceptar" onclick="window.location=('sacar_turno/frm_fechas')"/>
                <!--?=
//                form_button([
//                    'content' => 'Aceptar',
//                    'type' => 'submit',
//                    'class' => 'btn btn-lg btn-primary'
//                ])
//                ?-->
            </div>
        </div>
    </fieldset>
</form>
