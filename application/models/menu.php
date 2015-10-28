<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Model {
	
	public function __construct()
	{
            parent::__construct();
           // $this->load->database();
            
	}
        
        public function hello(){    
            return 'Hello';
        }
        public function get_tree($rol = 'paciente'){
            $arreglo= [];
            $hijo= [];
            $j=0;
            $i=0;            
            $padres = $this->obtenerMenu('', ['padre'=>0,'estado'=>1], 'object');
            foreach ($padres as $row){
//Si el rol no esta dentro del arreglo de tabla continua.            
//if(!in_array($rol, $piezas = explode(",", $row->tabla))){continue;}
                $arreglo[$j]['idmenu']=$row->idmenu;
                $arreglo[$j]['nombre']=$row->nombre;
                $arreglo[$j]['descripcion']=$row->descripcion;
                $arreglo[$j]['tipo']=$row->tipo;
                $arreglo[$j]['icon']=$row->icon;
                $arreglo[$j]['url']=$row->url;
                $arreglo[$j]['class']=$row->class;
                $arreglo[$j]['onclick']=$row->onclick;
                $arreglo[$j]['id_permiso']=$row->id_permiso;
                $arreglo[$j]['padre']=$row->padre;;                
                $arreglo[$j]['orden']=$row->orden;
                $arreglo[$j]['estado']=$row->estado;
                $arreglo[$i]['hijos']=$this->obtenerMenu('',['padre'=>$row->idmenu,'estado'=>1],'object');
                foreach ($arreglo[$i]['hijos'] as $rowChild){
            //if(!in_array($rol, $piezas = explode(",", $rowChild->tabla))){continue;}
                $hijo[$j]['idmenu']=$rowChild->idmenu;
                $hijo[$j]['nombre']=$rowChild->nombre;
                $hijo[$j]['descripcion']=$rowChild->descripcion;
                $hijo[$j]['tipo']=$rowChild->tipo;
                $hijo[$j]['icon']=$rowChild->icon;
                $hijo[$j]['url']=$rowChild->url;
                $hijo[$j]['class']=$rowChild->class;
                $hijo[$j]['onclick']=$rowChild->onclick;
                $hijo[$j]['id_permiso']=$rowChild->id_permiso;
                $hijo[$j]['padre']=$rowChild->padre;;                
                $hijo[$j]['orden']=$rowChild->orden;
                $hijo[$j]['estado']=$rowChild->estado;
                
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
