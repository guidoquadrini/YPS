<?php

require_once ('Usuario.php');
//require_once ('Turno.php');
//require_once ('Especialidad.php');
//require_once ('Billetera.php');
//require_once ('Consultorio.php');

/**
 * @version 1.0
 * @created 03-jul-2014 11:39:28 a.m.
 */
class ModelProfesional extends Persona {

    public $idProfesional;
    public $Matricula;
    public $idEspecialidad; // Luego estas deberian convertirse en el objeto especilidad.       
    public $Especialidad;   // Y dejar de llamarlas de esta manera.
    public $observacion_especialidad;

    function __destruct() {        
    }

    public function __construct() {
        parent::__construct();
    }

    public function get($var) {
        return $this->$var;
    }

    public function cargar_profesional($id = null) {
        parent::__construct(); //Levantar al padre
        $this->cargarUsuario($id); // Cargar Datos del usuario
        // Hacer consulta por datos de matricula y especialidad para el profesional.            
        $sql = "
            SELECT a.idProfesional, a.idEspecialidad, b.nombre as especialidad, a.observacion, a.matricula  
            FROM profespecialidad a 
            INNER JOIN especialidades b ON
            a.idEspecialidad = b.idEspecialidad AND idProfesional = " . $id;
        $query = $this->db->query($sql);
        $t_pro = $query->row();
        $this->idProfesional = $t_pro->idProfesional; //Cargar datos del Profesional
        $this->idEspecialidad = $t_pro->idEspecialidad;
        $this->Especialidad = $t_pro->especialidad;
        $this->observacion_especialidad = $t_pro->observacion;
        $this->Matricula = $t_pro->matricula;
        //echo "<pre>";        print_r($this);        exit(); // Revision de Datos Profesional
        //echo "<pre>";print_r($this);
    }

    public function __destroy() {
     $idProfesional= NULL;
     $Matricula= NULL;
     $idEspecialidad= NULL;     
     $Especialidad= NULL;  
     $observacion_especialidad= NULL;
    }

}

?>