<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends YPS_Controller {
    
    public function __construct() {
        parent::__construct();        
    }

    public function index() {
        if (!$this->usuario->permiso_habilitado('main','TableroDeControl')) redirect('usuarios/logout');
        $this->template->render('principal/TableroDeControl');
    }
}

/* End of file TableroDeControl.php */
/* Location: ./application/views/principal/TableroDeControl.php */