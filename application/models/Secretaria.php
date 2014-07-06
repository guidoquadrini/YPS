<?php
require_once ('Turno.php');
require_once ('Usuario.php');

/**
 * @version 1.0
 * @created 03-jul-2014 11:39:26 a.m.
 */
class Secretaria extends Usuario
{

	private $IdSecretaria;
	private $tpoUsuario;
	private $dscTpoUsuario;
	public $m_Turno;

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