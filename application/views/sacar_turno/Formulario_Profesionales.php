<form action="http://localhost/yps/index.php/users/login" method="post" accept-charset="utf-8" id='login_form' class="form-signin" style="background:white; margin-top: 25px; box-shadow: 0em 0em 10em black;" role="form">
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
