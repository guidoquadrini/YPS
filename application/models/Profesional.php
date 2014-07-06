<?php
require_once ('Usuario.php');
require_once ('Turno.php');
require_once ('Especialidad.php');
require_once ('Billetera.php');
require_once ('Consultorio.php');

/**
 * @version 1.0
 * @created 03-jul-2014 11:39:28 a.m.
 */
class Profesional extends Usuario
{

	private $dscTpoUsuario;
	private $idProfesional;
	private $tpoUsuario;
	private $Especialidad;
	public $m_Turno;
	public $m_Especialidad;
	public $m_Billetera;
	public $m_Consultorio;
	public $m_Horario;

	function __destruct()
	{
	}



	public function __construct()
	{
	}

	public function __destroy()
	{
	}

}
?>