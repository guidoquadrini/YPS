<?php
require_once ('Turno.php');
require_once ('Usuario.php');

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:39:34 a.m.
 */
class Obra_Social extends Usuario
{

	private $cntConsultas;
	private $Descripcion;
	private $duracionMedia;
	private $IdObraSocial;
	private $Nombre;
	private $observaciones;
	private $reqDerivacion;
	public $m_Turno;

	public function __construct()
	{
	}
        
        function __destruct()
	{
	}
}
