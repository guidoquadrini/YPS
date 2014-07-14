<?php
require_once ('Turno.php');
require_once ('Usuario.php');
require_once ('Historia Clinica.php');

/**
 * @version 1.0
 * @created 03-jul-2014 11:39:24 a.m.
 */
class Paciente extends Usuario
{

	private $dscTpoUsuario;
	private $IdObraSocial;
	private $idPaciente;
	private $tpoUsuario;
	public $m_Turno;
	public $m_Historia;
	public $m_Historia_Clinica;

	function __destruct()
	{
	}



	public function __construct()
	{
	}

	

}
