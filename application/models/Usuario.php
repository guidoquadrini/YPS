<?php


/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:39:32 a.m.
 */
abstract class Usuario
{

	private $apellido;
	private $ciudad;
	private $contraseña;
	private $cp;
	private $direccion;
	private $dni;
	private $eliminado;
	private $email;
	private $fec_altaUsuario;
	private $fotoURL;
	private $nombre;
	private $pais;
	private $publicado;
	private $sexo;
	private $telefono;
	private $usuario;
	private $comentario;

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