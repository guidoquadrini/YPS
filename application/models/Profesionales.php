<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:40:32 a.m.
 */
class Profesionales extends CI_Model {

    public $col_profesional = [];

    function __construct() {
        parent::__construct();
        $this->load->model('profesional', 'm_pro'); //Levantamos el modelo profesionales
    }

    function __destruct() {
        
    }

    public function obtenerProfesionales($select = null, $where = null, $fetch = null) {
        if (is_array($select)) {
            $this->db->select($select);
        }
        if (is_array($where)) {
            $this->db->where($where);
        }
        if ($fetch == 'object') {
            return $this->db->get('profespecialidad')->result();
        }
        return $this->db->get('profespecialidad')->result_array();
    }

    public function listar_profesionales() {
        milog('Modelo -> Clase Profesionales -> Ejecuta Metodo lista_profesionales()');
        $temporal = $this->obtenerProfesionales('', '', 'object'); //Consultar todos los profesionales
        foreach ($temporal as $prof) { //Iniciar un bucle
            $t_pro = new Profesional; //Instanciar un profesional
            $t_pro->cargar_profesional($prof->idProfesional); //Cargar modelo profesional con datos
            array_push($this->col_profesional, $t_pro); //Poner al profesional en el arreglo            
        }//Cerrar bucle
        return $this->col_profesional; //Retornar el listado de profesionales                 
    }

}

