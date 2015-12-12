<?php
//require_once ('Obra_Social.php');

/**
 * @author Sibarita
 * @version 1.0
 * @updated 05-jul-2014 06:31:06 p.m.
 */
class Obras_Sociales extends YPS_Colecciones
{

        public $col_Obra_Social = [];

	function __construct()
	{
            parent::__construct();
            $this->load->model('Obra_Social');
	}

	public function listar_obras_sociales()
	{
        $sql = "SELECT * FROM tpoobrasocial;";
        $result = $this->db->query($sql);
        //echo "<pre>";print_r($result->result());exit();
        foreach ($result->result() as $row)
        {
            $ObraSocial = new Obra_Social; //Instanciar un Turno
            //echo "<pre>";print_r($ObraSocial);echo "<br>";
            $ObraSocial->cargar_obrasocial($row->idObraSocial); //Cargar modelo turno con datos
            //echo "<pre>";print_r($ObraSocial);echo "<br>";
            array_push($this->col_Obra_Social, $ObraSocial); //Poner al turno en el arreglo
            //echo "<pre>";print_r($this->col_Obra_Social);exit();
            //$turno->__destroy();
        }//Cerrar bucle
        return $this->col_Obra_Social; //Retornar el listado de turnos                 
    }

}


