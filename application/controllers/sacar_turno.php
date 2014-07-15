<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Sacar_turno extends CI_Controller {

  function __construct()  {

    parent::__construct();
  }

  function index()  {
    
   //$this->load->model('Profesionales');
   //$listado_profesioanles = $this->profesionales->listar_profesionales();
      
   $this->load->view('sacar_turno/FormularioRegistroDeTurnos');
 //  $this->load->view('sacar_turno/FormularioProfesionales');
  }

  
  
}

/* End of file sacar_turno.php */
/* Location: ./application/controllers/sacar_turno.php */