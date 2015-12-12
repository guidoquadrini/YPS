<?php

class YPS_Model extends CI_Model {

    public $pk;
    public $tabla;
    public $modelo;

    public function __construct($pk = null, $tabla = null, $modelo = null) {
        parent::__construct();
        if (!is_null($pk))
            $this->pk = $pk;
        if (!is_null($tabla))
            $this->tabla = $tabla;
        if (!is_null($modelo))
            $this->modelo = $modelo;
    }

    public function __destruct() {
        foreach ($this as $property => $value) {
            $this->$property = null;
        }
    }

    public function guardar() {
        if (is_null($this->$this->pk)) {
            return $this->db->insert($this);
            $row = $this->db->get_where(strtolower(get_class()), [$this->pk => $this->$this->pk])->row();
            if (!$row)
                return false;
            return $this->db->where($this->pk, $this->$this->pk)
                            ->update(strtolower(get_class()), $this);
        }
    }

    public function papelera() {
        $row = $this->db->get_where(strtolower(get_class()), [$this->pk => $this->$this->pk])->row();
        if (!$row)
            return false;
        return $this->db->where($this->pk, $this->$this->pk)
                        ->update(strtolower(get_class()), ['eliminado' => 1]);
    }

    public function eliminar() {
        $row = $this->db->get_where(strtolower(get_class()), [$this->pk => $this->$this->pk])->row();
        if (!$row)
            return false;
        return $this->db->where($this->pk, $this->$this->pk)
                        ->delete(strtolower(get_class()));
    }

    public function cargar($row) {
        foreach ($row as $property => $value) {            
            if (property_exists(get_called_class(), $property)) { 
                $this->magic($property,$value);
            }            
        }        
    }

    public function getObject($modelo = null, $tabla = null, $where = null) {
        if (is_array($where)) {
            $this->db->where($where);
        }        
        $result = $this->db->get($tabla)->result();
        if (!is_null($modelo)) {
            //TODO: antes preuntar si el modelo esta cargado
            $this->load->model($this->modelo, 'modelo');
            foreach ($result as $row) {
                $retorno[] = $this->modelo->cargar($row);
            }
            return $retorno;
        }
        return $result;
    }

}

/* End of file Q_Model.php */
/* Location: ./core/Q_Model.php */

