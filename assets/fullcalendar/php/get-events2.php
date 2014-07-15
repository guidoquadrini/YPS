<?php include_once('../../../docs-assets/php/funcionesDB.php'); 
      include_once('../../../docs-assets/php/conexion.php'); // Incluye conexion a base de datos. Variable ($db).
//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';
//$_GET['start']=$_POST['start'];
//$_GET['end']=$_POST['end'];

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
$query="SELECT * FROM turno WHERE FechaHoraIni BETWEEN '".$_GET['start']."' AND '" . $_GET['end'] . "';";
echo $query;
TRY{
            $resultado = $db->query($query);
        }CATCH(exception $e) { // En caso de que la  conexion no se conforme, muestra mensaje de error.
            $mensaje = $e->getMessage(). "\n";
        };   
        $resultado = mysqli_fetch_assoc($resultado);
        var_dump($resultado);


// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($resultado as $result){
    

	// Convert the input array into a useful Event object
	$event = new Event($array, $timezone);
	// If the event is in-bounds, add it to the output
	if ($event->isWithinDayRange($range_start, $range_end)) {
		$output_arrays[] = $event->toArray();
	}
}

// Send JSON to the client.
echo json_encode($output_arrays);