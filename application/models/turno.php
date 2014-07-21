<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 10:02:53 a.m.
 */
class Turno extends CI_Model {

    public $Estado;
    public $IdObraSocial;
    public $IdPaciente;
    public $IdProfesional;
    public $IdTurno;
    public $Observaciones;
    public $PrecioActual;
    public $SobreTurno;
    public $Fecha_Hora;

    function __destruct()
    {
        
    }

    public function __construct()
    {
        
    }

    public function __destroy()
    {
        
    }

    public function generar_formulario_turno()
    {
        
    }

    public function cargar_turno($id)
    {
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

    public function generar_resumen()
    {
        
    }

    public function registrar_turno()
    {
        
    }

    private function _obra_social()
    {
        
    }

    public function _turno($turno)
    {
        $this->idTurno = $turno;
        return true;
    }

    private function _profesional($pro)
    {
        $this->IdProfesional = $pro;
    }

    private function _fecha_hora($fecha_hora)
    {
        $this->Fecha_Hora = $fecha_hora;
    }

    public function set_fecha_hora()
    {
        $this->_fecha_hora($fecha_hora);
    }

    private function _prestacion()
    {
        
    }

    public function set_profesional($pro)
    {
        $this->_profesional($pro);
    }

    public function anonimo()
    {
        $this->nombre = "Turno Ocupado";
        $this->apellido = "";
    }

}

?>