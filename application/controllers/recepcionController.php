<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RecepcionController extends YPS_Controller {
    public $CI;
    

    function __construct() {
        parent::__construct();
        $this->load->library('../controllers/turnosController');
        $this->load->model('turno');
        $this->load->model('turnos');
    }

    function index() {
        //Mostrar Pantalla Con los pacientes pendientes para el dia de la fecha.
        if (!$this->user->permiso_habilitado('yps')) redirect('users/logout');
        $cTurnos = new TurnosController();
        $colTurnos = $cTurnos->consultaTurnosDelDia();
        $this->template->render('recepcion/index');
    }
    public function frm_guardar_turno() {        
        $this->session->set_userdata('turno_obra_social', $this->input->post('cbo_obra_social'));
        $this->load->model('turno');
        $this->turno->registrar_turno();
        
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
        $this->session->userdate['turno_profesional'] = $this->input->post('cbo_profesional');
        $this->load->view('sacar_turno/FormularioFechas');
    }

    public function frm_grilla() {
        $fecha_turno = $this->input->post('input_fecha_turno');
        $this->load->model('turnos', 'cat_turnos');
        $todos_los_turnos = $this->cat_turnos->obtener_turnos();
        $datos = [
            'turnos' => $todos_los_turnos,
            'fecha' => $fecha_turno,
            'id' => $this->session->userdata('user_id')
        ];
        $this->load->view('sacar_turno/FormularioGrillaDeTurnos', $datos);
    }

    public function frm_registro() {
        $this->session->userdata['turno_profesional'] = 50; //Simulacion de usuario logoneado nro 2.
        $this->session->userdata['user_id'] = 2; //Simulacion de usuario logoneado nro 2.
        $_POST['fecha_hora'] = '1982-11-06T08:16:00';

//      echo "<pre>";print_r($this->session->userdata);
        $this->session->userdata['turno_fecha_hora'] = $this->input->post('fecha_hora');
        $this->load->model('Obras_Sociales', 'cat_obrassociales');
        $this->load->model('turnos', 'cat_turnos'); //Carga Modelo
        $this->load->model('Profesionales', 'cat_profesionales');
        $this->load->model('Pacientes', 'cat_pacientes');
        $this->cat_turnos->listar_turnos(); //Carga Catalogo.

        $fecha_hora = $this->input->post('fecha_hora');
//        echo "<pre>";print_r($fecha_hora);echo "<br>";
        $obras_sociales = $this->cat_obrassociales->listar_obras_sociales();
//        echo "<pre>";print_r($obras_sociales);echo "<br>";
        $idObraSocial = $this->cat_turnos->ultima_obrasocial_utilizada($this->session->userdata['user_id']);
//        echo "Ultima Obra Social Utilizada: <pre>";print_r($idObraSocial);echo "<br>";
        //$obraSocial= $this->cat_obrassociales->buscar_obrasocial($id_ObraSocial);
        $profesional = $this->cat_profesionales->buscar_profesional($this->session->userdata['turno_profesional']);
//        echo "<pre>";print_r($profesional);echo "<br>";
//        echo "ID_PACIENTE: <pre>";print_r($this->session->userdata['user_id']);echo "<br>";
        $paciente = $this->cat_pacientes->buscar_paciente($this->session->userdata['user_id']);
        //echo "<pre>";print_r($paciente);exit();
        $datos = [
            'profesional' => $profesional,
            'paciente' => $paciente,
            'obras_sociales' => $obras_sociales,
            'id_ultima_obra_social' => $idObraSocial,
            'fecha_turno' => $fecha_hora
        ];
        $this->load->view('sacar_turno/FormularioRegistroDeTurnos', $datos);
    }

}

/* End of file sacar_turno.php */
/* Location: ./application/controllers/sacarTurnoController.php */