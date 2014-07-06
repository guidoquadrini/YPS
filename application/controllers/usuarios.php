<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Usuarios extends CI_Controller {

  function __construct()  {

    parent::__construct();

    /* Cargamos la base de datos */
    $this->load->database();

    /* Cargamos la libreria*/
    $this->load->library('grocery_crud');

    /* Añadimos el helper al controlador */
    $this->load->helper('url');
  }

  function index()  {
    /*
     * Mandamos todo lo que llegue a la funcion
     * administracion().
     **/
    redirect('usuarios/administracion');
  }

  /*
   *
   **/
  function administracion()  {
    try{

    /* Creamos el objeto */
    $crud = new grocery_CRUD();

    /* Seleccionamos el tema */
    $crud->set_theme('flexigrid');

    /* Seleccionmos el nombre de la tabla de nuestra base de datos*/
    $crud->set_table('users');

    /* Le asignamos un nombre */
    $crud->set_subject('Usuarios');

    /* Asignamos el idioma español */
    $crud->set_language('spanish');

    /* Aqui le decimos a grocery que estos campos son obligatorios */
    $crud->required_fields(
      'id',
      'name',
      'email',
      'user',
      'password',
      'role'
    );

    /* Aqui le indicamos que campos deseamos mostrar */
    $crud->columns(
      'id',
      'name',
      'email',
      'user',
      'password',
      'role',
      'status',
      'active',
      'last_login',
      'created',
      'created_at',
      'modified',
      'modified_at'
    );

    /*Definir Ralaciones*/
    $crud->set_relation('role', 'roles', 'role');
    
    
    
    /* Generamos la tabla */
    $output = $crud->render();

    /* La cargamos en la vista situada en
    /applications/views/productos/administracion.php */
    $this->load->view('usuarios/administracion', $output);

    }catch(Exception $e){
      /* Si algo sale mal cachamos el error y lo mostramos */
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
}