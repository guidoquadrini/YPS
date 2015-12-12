<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class ModelMenu extends YPS_Model {

    public function __construct() {
        parent::__construct();
        // $this->load->database();
    }

    public function hello() {
        return 'Hello';
    }

    public function get_tree($rol = 'paciente') {
        $arreglo = [];
        $hijo = [];
        $j = 0;
        $i = 0;
        $padres = $this->obtenerMenu('', ['padre' => 0, 'estado' => 1], 'object');

        foreach ($padres as $row) {
            //TODO: Si el permiso del item de menu no esta dentro de los
            //permisos del usuario satar iteacion.
//Si el rol no esta dentro del arreglo de tabla continua.            
//if(!in_array($rol, $piezas = explode(",", $row->tabla))){continue;}
            $arreglo[$j]['idmenu'] = $row->idmenu;
            $arreglo[$j]['nombre'] = $row->nombre;
            $arreglo[$j]['descripcion'] = $row->descripcion;
            $arreglo[$j]['tipo'] = $row->tipo;
            $arreglo[$j]['url'] = $row->url;
            $arreglo[$j]['icon'] = $row->icon;
            $arreglo[$j]['class'] = $row->class;
            $arreglo[$j]['onclick'] = $row->onclick;
            $arreglo[$j]['id_permiso'] = $row->id_permiso;
            $arreglo[$j]['padre'] = $row->padre;
            ;
            $arreglo[$j]['orden'] = $row->orden;
            $arreglo[$j]['estado'] = $row->estado;
            //$arreglo[$i]['hijos']=$this->obtenerMenu('',['padre'=>$row->idmenu,'estado'=>1],'object');
            foreach ($this->obtenerMenu('', ['padre' => $row->idmenu, 'estado' => 1], 'object') as $rowChild) {
                //if(!in_array($rol, $piezas = explode(",", $rowChild->tabla))){continue;}
                $hijo[$i]['idmenu'] = $rowChild->idmenu;
                $hijo[$i]['nombre'] = $rowChild->nombre;
                $hijo[$i]['descripcion'] = $rowChild->descripcion;
                $hijo[$i]['tipo'] = $rowChild->tipo;
                $hijo[$i]['icon'] = $rowChild->icon;
                $hijo[$i]['url'] = $rowChild->url;
                $hijo[$i]['class'] = $rowChild->class;
                $hijo[$i]['onclick'] = $rowChild->onclick;
                $hijo[$i]['id_permiso'] = $rowChild->id_permiso;
                $hijo[$i]['padre'] = $rowChild->padre;
                ;
                $hijo[$i]['orden'] = $rowChild->orden;
                $hijo[$i]['estado'] = $rowChild->estado;
                $i++;
            };
            $i = 0;
            $arreglo[$j]['hijos'] = $hijo;
            $hijo = null;
            $j++;
        }
        $j = 0;

        return $arreglo;
    }

    private function obtenerMenu($select = null, $where = null, $fetch = null) {
        if (is_array($select)) {
            $this->db->select($select);
        }
        if (is_array($where)) {
            $this->db->where($where);
        }
        if ($fetch == 'object') {
            return $this->db->get('menu')->result();
        }
        return $this->db->get('menu')->result_array();
    }

}
