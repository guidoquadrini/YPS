<?php

/**
 * @author Sibarita
 * @version 1.0
 * @updated 05-jul-2014 06:31:06 p.m.
 * Comentario: Para que esta clase funcione, el nombre de la tabla
 * debe ser el mismo que el no mbre de el modelo.
 */
class YPS_Colecciones extends YPS_Model {

    public $coleccion;

    public function __construct($tabla, $pk, $modelo) {
        parent::__construct($pk, $tabla);
        $this->tabla = $tabla;
        $this->pk = $pk;
        $this->modelo = $modelo;    
    }
    public function __destruct() {
        parent::__destruct();
        $this->coleccion = null;
    }

    public function getSmart($select = null, $where = null, $fetch = 'object', $actualizarColeccion = true) {
        if (is_array($select))
            $this->db->select($select);
        if (is_array($where))
            $this->db->where($where);
        if ($fetch == 'object') {
            $result = $this->db->get($this->tabla)->result();
        } else {
            $result = $this->db->get($this->tabla)->result_array();
        }
        
        $CI = & get_instance();       
        $objeto = strtoupper(substr($this->modelo,0,1)) . substr($this->modelo, 1, strlen($this->modelo));
        if ($CI->load->is_loaded($this->modelo) == false) {
          $CI->load->model($this->modelo, $objeto);
          $temp = new $objeto;
        }else {
        $temp = new $this->modelo;
        }
        
        if ($actualizarColeccion) {
            $this->coleccion = NULL;
            foreach ($result as $row) {
                $this->coleccion[] = $temp->cargar($row);
            }
            return $this->coleccion;
        } else {
            $retorno = null;
            foreach ($result as $row) {
                $temp->cargar($row);
                $retorno[] = $temp;
            }
            return $retorno;
        }
    }

    public function buscarPorId($id) {
        $vRet = $this->getSmart(null, [$this->pk => $id], 'object', false);
        return $vRet[0];
    }

    public function guardar($data) {
        foreach ($data as $row) {
            $vRet[] = $row->guardar();
        }
        return $vRet;
    }

    public function consultarTodo() {
        $this->getSmart();
        return $this->coleccion;
    }

    public function consultarColeccion($where) {
        return $this->getSmart(null, $where, null, false);
    }

    public function papelera($data) {
        foreach ($data as $row) {
            $vRet[] = $row->papelera();
        }
        return $vRet;
    }

    public function eliminar($data) {
        foreach ($data as $row) {
            $vRet[] = $row->eliminar();
        }
        return $vRet;
    }

}
