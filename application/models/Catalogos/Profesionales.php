<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:40:32 a.m.
 */
class Model_Profesionales extends YPS_Colecciones {

    public $profesionales;

    function __construct() {
        parent::__construct();
        $this->load->model('profesional'); //Levantamos el modelo profesionales
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

    public function CargarCatalogo() {
        //Consultar todos los profesionales
        foreach ($this->obtenerProfesionales(['id'], '', 'object') as $idProf) {
            $oProfesional = new Profesional(); //Instanciar un profesional
            $oProfesional->cargar_profesional($idProf); //Cargar modelo profesional con datos
            $this->col_profesional[] = $oProfesional; //Poner al profesional en el arreglo            
        }
        return $this->col_profesional; //Retornar el listado de profesionales                 
    }

    public function getProfesionalPorId($id) {
        if (count($this->profesionales() == 0)) {
            $this->CargarCatalogo();
        }
        foreach ($this->col_profesional as $pro) {
            if ($pro->idProfesional == $id) {
                return $pro;
            }
        }
        return null; //deberia cargarse la coleccion en el contrusct para no tener que seguir haciendo esto.
    }

}
