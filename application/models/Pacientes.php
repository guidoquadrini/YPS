<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:39:35 a.m.
 */
class Pacientes extends CI_Model{

    public $col_pacientes = [];

    function __construct()
    {
        parent::__construct();
        $this->load->model('paciente');
    }

    function __destruct()
    {
        
    }
    
    public function obtenerPacientes($select = null, $where = null, $fetch = null)
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
            return $this->db->get('Pacientes')->result();
        }
        return $this->db->get('Pacientes')->result_array();
    }

    public function listar_pacientes()
    {
        milog('Modelo -> Clase Pacientes -> Ejecuta Metodo listar_procientes()');
        $result = $this->obtenerPacientes('', '', 'object'); //Consultar todos los profesionales
        foreach ($result as $row)
        { //Iniciar un bucle
            $temp = new Paciente; //Instanciar un profesional
            $temp->cargar_paciente($row->id_paciente); //Cargar modelo profesional con datos            
            array_push($this->col_pacientes, $temp); //Poner al profesional en el arreglo            
        }//Cerrar bucle
        //echo "<pre>";print_r($this->col_pacientes);exit();
        return $this->col_pacientes; //Retornar el listado de profesionales                 
    }
    
    public function buscar_paciente($id)
    {   $id=55;// Deberia unificarse la tabla users con usuarios
        //echo "BUSCAR PACIENTE - ID: <pre>";print_r($id);echo "<br>";
        $this->listar_pacientes();
        //echo "<pre>";print_r($this->col_pacientes);exit();
        foreach ($this->col_pacientes as $pac)
        {
            if ($pac->idPaciente == $id)
            {
                return $pac;
            }
        }
        return null; //deberia cargarse la coleccion en el contrusct para no tener que seguir haciendo esto.
    }


}

