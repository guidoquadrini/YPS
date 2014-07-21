<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



/* Heredamos de la clase CI_Controller */

class Sacar_turno extends CI_Controller {
    private $iturno;

    function __construct()
    {
        parent::__construct();
        $this->load->model('turno');
        $this->iturno = new turno;
    }

    function index()
    {
        $estado = $this->input->post('estado');
        switch ($estado)
        {
            case "0"://Inicia CU sacar turno.
                $this->frm_profesionales();
                break;
            case "1"://Ya selecciono el profesional.                
                $this->frm_fechas();                
                break;
            case "2"://Ya selecciono la fecha del turno.
                $fecha_turno = $this->input->post('frm_profesioanels');
                $this->frm_grilla($fecha_turno);
                break;
            case "3"://Ya selecciono el turno.
                $this->frm_registro();
                break;
            default :
                $this->frm_profesionales();
                break;
        }
    }

    public function frm_profesionales()
    {
        milog('**Acceso Metodo frm_profesionales de la controladora');
        milog('Controladora -> Carga Modelo Profesionales (Catalogo).');
        $this->load->model('Profesionales');
        milog('Controladora -> Modelo -> Llama al metodo: lista_profesionales del modelo.');
        $listado = $this->Profesionales->listar_profesionales();
        milog('Controladora -> Vista: Formulario Profesionales -> Carga y Evnia datos a la Vista.');
        $data_vista = $this->addprefijo('pro', $listado);
        $listado = null;
        $listado['data_vista'] = $data_vista;
        $this->load->view('sacar_turno/FormularioProfesionales', $listado);
        
    }

    private function addprefijo($prefijo, $arreglo)
    {
        $i = 0;
        foreach ($arreglo as $item)
        {
            $nuevo[$prefijo . $i] = $item;
            $i++;
        }
        return $nuevo;
    }

    public function frm_fechas()
    {
        $pro_turno = $this->input->post('cbo_profesional');
        $this->iturno->set_profesional($pro_turno);
        echo "Fechas - Turno Instanciado: <br><pre>";print_r($this->iturno);
        $this->load->view('sacar_turno/FormularioFechas');
    }

    public function frm_grilla($fecha)
    {
        $fecha_turno = $this->input->post('input_fecha_turno');        
        $this->load->model('turnos', 'cat_turnos');
        $todos_los_turnos = $this->cat_turnos->obtener_turnos();        
        echo "Grilla -  Turno Instanciado: <br><pre>";print_r($this->iturno);exit();
        $datos = ['turnos'=> $todos_los_turnos, 'fecha' => $fecha];
        $this->load->view('sacar_turno/FormularioGrillaDeTurnos', $datos);
    }
        
    public function frm_registro($fecha_hora)
    {
        $fecha_hora_turno = $fecha_hora;
        $this->iturno->set_fecha_hora($fecha_hora_turno);
        
        $os_turno = $this->paciente->ultima_obra_social();
        
        $this->load->model('obras_sociales', 'ooss');
        $obras_sociales = $this->ooss->listar_obras_sociales();
           
       echo "<pre>";print_r($this->iturno);exit();
        $this->load->view('sacar_turno/FormularioRegistroDeTurnos', $todos_los_turnos);
    }

}

/* End of file sacar_turno.php */
/* Location: ./application/controllers/sacar_turno.php */