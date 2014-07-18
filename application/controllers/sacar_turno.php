<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */

class Sacar_turno extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $estado = $this->input->post('estado');
        switch ($estado) {
            case "0"://Inicia CU sacar turno.
                                echo "<script>alert('pro');</script>";
$this->frm_profesionales();
                
                break;
            case "1"://Ya selecciono el profesional.
                                echo "<script>alert('fechas');</script>";

                $this->frm_fechas();
                break;
            case "2"://Ya selecciono la fecha del turno.
                                echo "<script>alert('grillla');</script>";

                $this->frm_grilla();
                break;
            case "3"://Ya selecciono el turno.
                                echo "<script>alert('registro');</script>";

                $this->frm_registro();
                break;
            default :
                                echo "<script>alert('default');</script>";
$this->frm_profesionales();
                break;
        }
       
    }

    public function frm_profesionales() {
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

    private function addprefijo($prefijo, $arreglo) {
        $i = 0;
        foreach ($arreglo as $item) {
            $nuevo[$prefijo . $i] = $item;
            $i++;
        }
        return $nuevo;
    }

    public function frm_fechas() {
        $pro = null;
//crear turno
        $this->load->model('turno', 'iturno');
        $this->iturno->_profesional($pro);
        $this->load->view('sacar_turno/FormularioFechas');
    }

    public function frm_grilla($fecha= null) {
//crear turno
        $this->load->model('turnos', 'cat_turnos');
        $todos_los_turnos = $this->cat_turnos->obtener_turnos();
        $this->load->view('sacar_turno/FormularioGrillaDeTurnos', $todos_los_turnos);
    }

    public function frm_registro($fecha) {
//crear turno
        $this->load->model('turnos', 'cat_turnos');
        $todos_los_turnos = $this->cat_turnos->obtener_turnos();
        $this->load->view('sacar_turno/FormularioRegistroDeTurnos', $todos_los_turnos);
    }

}

/* End of file sacar_turno.php */
/* Location: ./application/controllers/sacar_turno.php */