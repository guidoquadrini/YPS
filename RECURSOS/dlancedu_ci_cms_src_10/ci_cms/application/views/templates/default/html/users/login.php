<div class="row">
    <?= validation_errors(
            '<div class="alert alert-danger alert-dismissable">', 
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'
            ) ?>
    
    <div class="col-md-6 col-md-offset-3">
        <?= form_open('', ['class' => 'form-horizontal', 'id' => 'form_login', 'role' => 'form'], ['login' => 1]) ?>
            <div class="form-group">
                <?= form_label($this->lang->line('cms_general_label_user'), 'user', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-8">
                    <?= form_input([
                        'id' => 'user',
                        'name' => 'user',
                        'maxlength' => 30,
                        'placeholder' => $this->lang->line('cms_general_label_user'),
                        'class' => 'form-control',
                    ], set_value('user'), 'required') ?>
                </div>
            </div>
			
            <div class="form-group">
                <?= form_label($this->lang->line('cms_general_label_password'), 'password', ['class' => 'col-sm-3 control-label']) ?>
                <div class="col-sm-8">
                    <?= form_password([
                        'id' => 'password',
                        'name' => 'password',
                        'maxlength' => 30,
                        'placeholder' => $this->lang->line('cms_general_label_password'),
                        'class' => 'form-control'
                    ], '', 'required') ?>
                </div>
            </div>
			
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <?= form_button([
                        'content' => '<span class="glyphicon glyphicon-lock"></span> ' . $this->lang->line('cms_general_label_button_access'),
                        'type' => 'submit', 
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        <?= form_close() ?>
    </div>
</div>