<?php

/**
 * @version 1.0
 * @created 03-jul-2014 11:39:24 a.m.
 */
class Paciente extends Usuario {

    public $idPaciente;
    public $IdObraSocial;
    public $whatsapp;
    public $facebook;
    public $skype;

    function __destruct()
    {
        
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('turno');
    }

    public function cargar_paciente($id = null)
    {
        parent::__construct(); //Levantar al padre
        $this->cargarUsuario($id); // Cargar Datos del usuario
        // Hacer consulta por datos de matricula y especialidad para el profesional.            
        $sql = "
            SELECT a.id_paciente, a.id_obrasocial, a.whatsapp, a.facebook, a.skype
            FROM Pacientes a
            INNER JOIN usuarios b ON
            a.id_paciente = b.idUsuario
            AND a.id_paciente = " . $id;
        //echo "<pre>";
        //print_r($sql);
        $query = $this->db->query($sql);
        $row = $query->row();

        $this->idPaciente = $row->id_paciente;
        $this->IdObraSocial = $row->id_obrasocial;
        $this->whatsapp = $row->whatsapp;
        $this->facebook = $row->facebook;
        $this->skype = $row->skype;


        //echo "<pre>";        print_r($this);        exit(); // Revision de Datos Profesional
        //echo "<pre>";print_r($this);
    }

}
