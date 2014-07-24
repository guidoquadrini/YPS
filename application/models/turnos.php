<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:39:39 a.m.
 */
class Turnos extends CI_Model {

    public $col_Turnos = [];

    //public $col_Eventos = [];

    function __construct()
    {
        parent::__construct();
        $this->load->model('turno');
        $this->load->model('event');
    }

    function __destruct()
    {
        $col_Turnos = null;
    }

    /**
     * 
     * @param obj_tpo_usuario
     */
    public function obtener_turnos()
    {
        $result = $this->listar_turnos();
        $coleccion = [];
        foreach ($result as $row)
        {
            if ($row->IdPaciente != $this->session->userdata('user_id'))
            {
                $row->anonimo();
            }
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $temp = new DateTime($row->Fecha_Hora);
            $fecha_hora = Date(\DateTime::ATOM, $temp->getTimestamp());
            $evento = new Event;
            $evento->cargar_evento([
                'title' => $row->nombre . " " . $row->apellido,
                'allDay' => false,
                'start' => $fecha_hora, // a DateTime
                'end' => $fecha_hora // a DateTime, or null
                    ], null);

            array_push($coleccion, $evento->toArray()); //Poner el turno en el arreglo.
        }//Cerrar bucle
        //echo "<pre>";print_r($coleccion);exit();
        return $coleccion; //Retornar coleccion modificada de turnos.
    }

    public function listar_turnos()
    {

        $sql = "SELECT * FROM turno;";
        $result = $this->db->query($sql);
        foreach ($result->result() as $row)
        {
            $turno = new Turno; //Instanciar un Turno
            $turno->cargar_turno($row->idTurno); //Cargar modelo turno con datos
            array_push($this->col_Turnos, $turno); //Poner al turno en el arreglo
            //$turno->__destroy();
        }//Cerrar bucle
        return $this->col_Turnos; //Retornar el listado de turnos                 
    }

    public function ultima_obrasocial_utilizada($id)    {
        //echo "<pre>";print_r($this->col_Turnos != null);exit();
        if ($this->col_Turnos != null)        {
            $coleccion = null;
            $coleccion = [];
            foreach ($this->col_Turnos as $turno)
            {

                if ($turno->IdPaciente == $id)                {
                    array_push($coleccion, $turno);
                }
            }
            if ($coleccion != null)            {
                //echo "Coleccion distinta de null";
                //echo "<br>";
                $buscado = null;
                //echo "Tamaño de la coleccion: " . count($coleccion);
                //echo "<br>";
                //echo "<pre>";
                //print_r($coleccion);
                //echo "<br>";
                for ($i = 0; $i < (count($coleccion)); $i++)
                {
                    //echo "valor de i: " . $i;
                    If ($i == 0)
                    {
                        //echo "<br>";
                        // echo "entro";
                        //echo "<br>";
                        $buscado = null;
                        $buscado = $coleccion[0];
                        //echo "<pre>";
                        //print_r($buscado);
                        continue;
                    }
                    if ($coleccion[$i - 1]->fecha_turno < $coleccion[$i]->fecha_turno)
                    {
                        $buscado = $coleccion[$i];
                    }
                }
                //echo "<pre>";
                //var_dump($buscado);
                //exit();
                return $buscado->IdObraSocial;
            }
        }
        return 2;//Efectivo
    }

// pasar cada turno al objeto turno
//agregarlo a la coleccion
//devolver todos los turnos.
}
