<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class TurnosController extends YPS_Controller {

    Public Function index() {

        if (!$this->user->permiso_habilitado('yps')) {
            redirect('users/logout');            
        }
        
        $this->load->model('users','usuarios');
        $usuario = $this->usuarios->obtenerUsuario( NULL , ['id' => $this->user->id], 'object');
           
       
        $this->template->render();
       
        if ($this->user->permiso_habilitado('yps') != TRUE) {
            redirect('users/logout');
        }
        $this->load->model('users', 'usuarios');
        $usuario = $this->usuarios->obtenerUsuario(NULL, ['id' => $this->user->id], 'object');

        $this->load->model('menu', 'menu_uno');
        $menu_filtrado = $this->menu_uno->get_tree('paciente'); // Rol de Filtrado.
//        echo '<pre>';
//        print_r($usuario);
//        exit();

        $vistas = [
            'header' => $this->load->view('ypsmain/top_menu', $usuario[0], TRUE),
            'footer' => $this->load->view('ypsmain/footer', '', TRUE),
            'sideBar' => $this->load->view('ypsmain/menu_lateral', ['menu' => $menu_filtrado], TRUE)
        ];
        $this->template->render($vistas );
    }
    
    Public Function consultaTurnosDelDia() {
        return null;
        
    }

    
    
    
}

/* End of file Ctrl_Tablero.php */
/* Location: ./application/controllers/turnoController.php */