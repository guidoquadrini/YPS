<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model {
	
	public function __construct()
	{
            parent::__construct();
            $this->load->database();
            
	}
        public function registro($select=null, $where=null, $fetch=null)
        {
            if (is_array($select))
            {
                $this->db->select($select);
            }
            if (is_array($where))
            {
                $this->db->where($select);
            }
            if ($fetch == 'object')
            {
                return $this->db->get('usuarios')->result();
            }
            return $this->db->get('usuarios')->result_array();
        }
}
