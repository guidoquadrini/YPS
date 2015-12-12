<h1>login</h1>
<?php echo validation_errors();?>
<?php echo form_open('', ['id'=>'form_login', 'style'=>'width:300px; margin: 0 auto;'], ['login'=>1]);?>
<?php echo form_fieldset('Datos de Usuario');?>

<p>
<?php echo form_label($this->lang->line('yps_general_label_user'), 'user');?>
<?php echo form_input(['id'=> 'user', 'name'=> 'user'], set_value('user'));?>
<?php echo form_error('user');    ?>
</p>
<p>
<?php echo form_label($this->lang->line('yps_general_label_password'), 'passwprd');?>
<?php echo form_password(['id'=> 'password', 'name'=> 'password']);?>
    <?php echo form_error('password');  ?>  
</p>

<?php echo form_submit(['value'=>$this->lang->line('yps_general_label_button_access')])?>

<?php echo form_fieldset_close();?>
<?php echo form_close();?>