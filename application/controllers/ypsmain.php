<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ypsmain extends YPS_Controller {

    public function index() {
        //$this->load->library('user');   Ya se cargo en YPS_Controller     
        if ($this->user->permiso_habilitado('yps') != TRUE) {
            redirect('users/logout');            
        }
        $this->load->model('users','usuarios');
        
        $usuario = $this->usuarios->obtenerUsuario( NULL , ['id' => $this->user->id], 'object');
        
        $vistas = array(
            'top_menu' => $this->load->view('ypsmain/top_menu',  $usuario[0],TRUE),
            'footer' => $this->load->view('ypsmain/footer','',TRUE)
        );
        
        $this->load->view('ypsmain/main', $vistas);
    }
}

/* End of file ypsmain.php */
/* Location: ./application/controllers/ypsmain.php */