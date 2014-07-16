<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Sacar_turno extends CI_Controller {

  function __construct()  {

    parent::__construct();
  }

  function index()  {
    
   //$this->load->model('Profesionales');
   //$listado_profesioanles = $this->profesionales->listar_profesionales();
      
   $this->load->view('sacar_turno/FormularioProfesionales');
 //  $this->load->view('sacar_turno/FormularioProfesionales');
  }

  public function frm_fechas(){
$pro=null      ;
//crear turno
      $this->load->model('turno', 'iturno');
      $this->iturno->_profesional($pro);
      $this->load->view('sacar_turno/FormularioFechas');
      
  }
  public function frm_grilla($fecha){
//crear turno
      $this->load->model('turnos', 'cat_turnos');
      $todos_los_turnos=$this->cat_turnos->obtener_turnos();
      $this->load->view('sacar_turno/FormularioGrillaDeTurnos',$todos_los_turnos);
      
  }
  
  
}

/* End of file sacar_turno.php */
/* Location: ./application/controllers/sacar_turno.php */