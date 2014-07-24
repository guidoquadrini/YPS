<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FullCalendar extends CI_Controller {

    public $timezone;

    function __construct()
    {
       parent::__construct();
       $this->load->model('Event');
    }

    function index()
    {        
    }

    function get_events_db()
    {       
       $_POST['start']= '2013-01-01';
       $_POST['end']= '2015-01-01';
       $_POST['id'] = '2';
       $_POST['timezone'] = 'America/Argentina/Buenos_Aires';

       $id_usuario_actual = $this->input->post('id');
        $inicio = $this->input->post('start');
        $fin = $this->input->post('end');
        $timezone = $this->input->post('timezone');
        if (!isset($_POST['start']) || !isset($_POST['end']))
        {
            die("Please provide a date range.");
        }
        $range_start = parseDateTime($inicio);
        $range_end = parseDateTime($fin);
       
        if (!isset($_POST['timezone'])){
            $timezone =   new DateTimeZone($timezone);
        }else {
            $timezone = null;
        }
        
        $query = "CALL eventoentre('" . $inicio . "' , '" . $fin . "' , " . $id_usuario_actual . ");";
        //echo $query;
        //echo "<br>";
        TRY {
               $resultado = $this->db->query($query);
        } CATCH (exception $e) { // En caso de que la  conexion no se conforme, muestra mensaje de error.
            $mensaje = $e->getMessage() . "\n";
            die($mensaje);
        }
        $data = '[';
       ///echo "<pre>";print_r($resultado->result());exit();
        foreach ($resultado->result() as $row)
        {
            $data .= json_encode($row) . ', ';
        }
        $data = substr($data, 0, (strlen($data) - 2));
        $data .=']';
        //echo "<pre>";print_r($data);exit();
        $input_arrays = json_decode($data, true);
        $output_arrays = array();
        foreach ($input_arrays as $array)
        {
            $array['start'] = $this->convertFecha($array['start']);
            $array['end'] = $this->convertFecha($array['end']);
            $event = new Event;
            $event->cargar_evento($array, $timezone);
            if ($event->isWithinDayRange($range_start, $range_end))
            {
                $output_arrays[] = $event->toArray();
            }
        }
        echo json_encode($output_arrays);
    }

    function convertFecha($fecha, $timezone = 'America/Argentina/Buenos_Aires'){
        date_default_timezone_set($timezone);
        $temp = new DateTime($fecha);
        return Date(\DateTime::ATOM, $temp->getTimestamp());
    }

}
