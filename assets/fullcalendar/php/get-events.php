<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Q-AppWeb/docs-assets/php/funcionesDB.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Q-AppWeb/docs-assets/php/conexion.php'); // Incluye conexion a base de datos. Variable ($db).
require dirname(__FILE__) . '/utils.php';

//$_GET['start']=$_POST['start'];
//$_GET['end']=$_POST['end'];
$_GET['start'] = '2013-06-01';
$_GET['end'] = '2015-06-01';
$_GET['timezone']='America/Argentina/Buenos_Aires';
// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
    die("Please provide a date range.");
}

// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
$range_start = parseDateTime($_GET['start']);
$range_end = parseDateTime($_GET['end']);

// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
    $timezone = new DateTimeZone($_GET['timezone']);
}

// Read and parse our events JSON file into an array of event data arrays.
$query = "CALL eventoentre('" . $_GET['start'] . "' , '" . $_GET['end'] . "');";

TRY {
    $resultado = $db->query($query);
} CATCH (exception $e) { // En caso de que la  conexion no se conforme, muestra mensaje de error.
    $mensaje = $e->getMessage() . "\n";
};
$data = '[';
while ($row = $resultado->fetch_assoc()) {
    $data .= json_encode($row) . ', ';
};
$data = substr($data, 0,(strlen($data)-2) );
$data .=']';
$input_arrays = json_decode($data, true);

// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($input_arrays as $array) {
    
    $array['start']=convertFecha($array['start']);
    $array['end']=convertFecha($array['end']);

    // Convert the input array into a useful Event object
    $event = new Event($array, $timezone);

    // If the event is in-bounds, add it to the output
    if ($event->isWithinDayRange($range_start, $range_end)) {
//        var_dump($event);
        $output_arrays[] = $event->toArray();
    }
}

// Send JSON to the client.
echo json_encode($output_arrays);

function convertFecha($fh){
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $temp = new DateTime($fh);    
    return Date(\DateTime::ATOM,$temp->getTimestamp());
};
