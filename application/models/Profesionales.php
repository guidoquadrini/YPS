<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:40:32 a.m.
 */
class Profesionales extends CI_Model
{

	public $col_profesinoal=[];
	function __construct()
	{
        parent::__construct();
        $this->load->model('profesional');
	}

	function __destruct()
	{
            
	}

	public function listar_profesionales()
                
	{
                    $this->load->model('profesional','m_pro');

        $col_profesional = new stdClass();
        $temporal= obtenerProfesional('','','object');
        $i++;
        foreach ($temporal as $prof){
            $this->m_pro->__contruct$prof; // Aqui deberia hacerse asignacion uno a uno con los campos de la clase prof.
            $col_profesional[$i]=$i_prof;
            $i++;
        }
        return $col_profesional;
	}
        
        public function obtenerProfesional($select=null, $where=null, $fetch=null)
        {
            if (is_array($select))
            {
                $this->db->select($select);
            }
            if (is_array($where))
            {
                $this->db->where($where);
            }
            if ($fetch == 'object')
            {
                return $this->db->get('Usuarios')->result();
            }
            return $this->db->get('Usiarios')->result_array();
            
        }

}
?>