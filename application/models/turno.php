<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 10:02:53 a.m.
 */
class ModelTurno extends Q_Model {

    public $Estado;
    public $IdObraSocial;
    public $IdPaciente;
    public $IdProfesional;
    public $IdTurno;
    public $Observaciones;
    public $PrecioActual;
    public $SobreTurno;
    public $Fecha_Hora;
    public $nombre;
    public $apellido;

    function __destruct() {
        
    }

    public function __construct() {
        // $this->ci &= get_instance();
    }

    public function __destroy() {
        
    }

    public function generar_formulario_turno() {
        
    }

    public function cargar_turno($id) {
        // Hacer consulta por datos de matricula y especialidad para el profesional.            
        $sql = "
            SELECT *
            FROM turno
            WHERE idTurno = " . $id;
        $query = $this->db->query($sql);
        $row = $query->row();
        $this->idTurno = $row->idTurno; //Cargar datos del Turno
        //$this->Asistio          = $row->Asistio;
        //$this->Debe             = $row->Debe;
        $this->Estado = $row->estado;
        //$this->IdEspecialidad   = $row->idEspecialidad;
        $this->IdObraSocial = $row->idobrasocial;
        $this->IdPaciente = $row->IdPaciente;
        $this->IdProfesional = $row->idProfesional;
        //$this->IdTpoConsulta    = $row->IdTpoConsulta;
        $this->IdTurno = $row->idTurno;
        $this->Observaciones = $row->Observaciones;
        $this->PrecioActual = $row->PrecioActual;
        $this->SobreTurno = $row->sobreturno;
        $this->Fecha_Hora = $row->FechaHoraIni;
        //$this->Prestacion       = $row->Prestacion;
    }

    public function generar_resumen() {
        
    }

    public function registrar_turno() {

        $fecha = $this->Fecha_Hora;
        $date = date_create_from_format('d/M/Y:H:i:s', $fecha);
//        $date->getTimestamp();
        
        $dateFin = strtotime('+13 minute', strtotime($date));
        
        $sql = "         
INSERT INTO tuno(IdPaciente, FechaHoraIni, FechaHoraFin, idProfesional, 
Observaciones, PrecioActual, sobreturno, idobrasocial, estado, 
AU_usuario, AU_fechahora, AU_accion) 
         values($this->IdPaciente, $this->Fecha_Hora, $this->Fecha_Hora, $this->IdProfesional,
             '', '', 0, $this->IdObraSocial, 1);
             ";
        echo "<pre>";
        print_r($sql);
        echo "</pre>";
        die;
    }

    private function _obra_social() {
        
    }

    public function _turno($turno) {
        $this->idTurno = $turno;
        return true;
    }

    private function _profesional($pro) {
        $this->IdProfesional = $pro;
    }

    private function _fecha_hora($fecha_hora) {
        $this->Fecha_Hora = $fecha_hora;
    }

    public function set_fecha_hora() {
        $this->_fecha_hora($fecha_hora);
    }

    private function _prestacion() {
        
    }

    public function set_profesional($pro) {
        $this->_profesional($pro);
    }

    public function anonimo() {
        $this->nombre = "Turno Ocupado";
        $this->apellido = "";
    }

}

?>