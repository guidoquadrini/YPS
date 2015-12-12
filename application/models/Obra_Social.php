<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:39:34 a.m.
 */
class ModelObra_Social extends Q_Model {

    public $Descripcion;
    public $IdObraSocial;
    public $Nombre;

    //private $reqDerivacion;

    public function __construct() {
        parent::__construct();
        $this->load->model('Turno');
    }

    function cargar_obrasocial($id) {

        $sql = "
            SELECT *
            FROM tpoobrasocial
            WHERE idObraSocial = " . $id;


        $query = $this->db->query($sql);
        $row = $query->row();
        $this->IdObraSocial = $row->idObraSocial; //Cargar datos del Turno
        $this->Descripcion = $row->Descripcion;
        $this->Nombre = $row->nombre;
    }

}
