<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ypsmain extends YPS_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('../controllers/SacarTurnoController');
    }

    public function index() {
        if (!$this->user->permiso_habilitado('ypsmain','TableroDeControl')) redirect('users/logout');
        $cTurno = new SacarTurnoController();
        //$cTurno->frm_fechas();
        //$frmFechas=$this->load->view('sacar_turno/FormularioFechas',[],true);

        
        //$this->template->data;
        
        $this->template->render('principal/TableroDeControl');
    }
}

/* End of file TableroDeControl.php */
/* Location: ./application/views/principal/TableroDeControl.php */