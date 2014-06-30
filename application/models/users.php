<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {
	
	public function __construct()
	{
            parent::__construct();
           // $this->load->database();
            
	}
        public function obtenerUsuario($select=null, $where=null, $fetch=null)
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
                return $this->db->get('users')->result();
            }
            return $this->db->get('users')->result_array();
            
        }
}
