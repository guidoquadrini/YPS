<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Model {
	
	public function __construct()
	{
            parent::__construct();
           // $this->load->database();
            
	}
        
        
        public function get_tree($rol = 'paciente'){
            $arreglo= [];
            $hijo= [];
            $j=0;
            $i=0;            
            $padres=$this->obtenerMenu('', ['nivel'=>0], 'object');
            foreach ($padres as $row){
            if(!in_array($rol, $piezas = explode(",", $row->tabla))){continue;}
                $arreglo[$i]['idmenu']=$row->idmenu;
                $arreglo[$i]['nombre']=$row->nombre;
                $arreglo[$i]['descripcion']=$row->descripcion;
                $arreglo[$i]['habilitado']=$row->habilitado;
                $arreglo[$i]['url']=$row->url;
                $arreglo[$i]['tabla']=$row->tabla;
                $arreglo[$i]['nivel']=$row->nivel;
                $arreglo[$i]['onclick']=$row->onclick;
                $arreglo[$i]['hijos']=$this->obtenerMenu('',['nivel'=>$row->idmenu],'object');
                foreach ($arreglo[$i]['hijos'] as $rowChild){
            if(!in_array($rol, $piezas = explode(",", $rowChild->tabla))){continue;}
                $hijo[$j]['idmenu']=$rowChild->idmenu;
                $hijo[$j]['nombre']=$rowChild->nombre;
                $hijo[$j]['descripcion']=$rowChild->descripcion;
                $hijo[$j]['habilitado']=$rowChild->habilitado;
                $hijo[$j]['url']=$rowChild->url;
                $hijo[$j]['tabla']=$rowChild->tabla;
                $hijo[$j]['nivel']=$rowChild->nivel;
                $hijo[$j]['onclick']=$rowChild->onclick;                
                $j++;
            }
                $arreglo[$i]['hijos']=$hijo;
                $i++;
                $j=0;
            }
            return $arreglo;
                }
        
        private function obtenerMenu($select=null, $where=null, $fetch=null)
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
                return $this->db->get('menu')->result();
            }
            return $this->db->get('menu')->result_array();
            
        }
}
