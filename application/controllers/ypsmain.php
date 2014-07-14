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
        
        $this->load->model('menu', 'menu_uno');
        $menu_filtrado = $this->menu_uno->get_tree('profesional');// Rol de Filtrado.
        echo '<pre>';
        print_r($usuario);
        exit();
            
        $vistas = [
            'top_menu' => $this->load->view('ypsmain/top_menu',  $usuario[0],TRUE),
            'footer' => $this->load->view('ypsmain/footer','',TRUE),
            'menu_lateral' =>$this->load->view('ypsmain/menu_lateral', ['menu' => $menu_filtrado], TRUE)
                  ];
        
        $this->load->view('ypsmain/main', $vistas);
    }
}

/* End of file ypsmain.php */
/* Location: ./application/controllers/ypsmain.php */