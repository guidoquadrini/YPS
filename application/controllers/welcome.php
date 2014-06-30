<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends YPS_Controller {

    public function index() {
        $this->load->library('user');        
        if ($this->user->permiso_habilitado('yps') != TRUE) {
            redirect('users/logout');            
        }
        $this->load->model('users','usuarios');
        
        $usuario = $this->usuarios->obtenerUsuario( NULL , ['id' => $this->user->id], 'object');
        echo '<pre>';
        var_dump($usuario);
        echo '</pre>';
        $vistas = array(
            'top_menu' => $this->load->view('welcome/top_menu',  $usuario[0],TRUE),
            'footer' => $this->load->view('welcome/footer','',TRUE)
        );
        
        $this->load->view('welcome/main', $vistas);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */