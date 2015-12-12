<?php
require_once 'Catalogos/personas.php';
require_once 'modelPersona.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ModelUsuario extends YPS_Model {

    CONST PK = 'id';
    CONST TABLA = 'usuarios';
    CONST OBJETO = 'modelUsuario';

    private $id;
    private $user;
    private $password;
    private $role;
    private $status;
    private $active;
    private $last_login;
    private $created;
    private $created_at;
    private $modified;
    private $modified_at;
    private $persona;

    public function magic($var = null, $valor = null){
        if (is_null($var)){return false;}
        if(is_null($valor)){
            return $this->$var;
        }else{
            $this->$var = $valor;
        }
    }
    
    public function __construct() {
        parent::__construct(self::PK,self::TABLA,self::OBJETO);
    }

    public function cargar($row) {
        parent::cargar($row);
        //Aqui debajo deben cargarse todas las relaciones simples.
        $this->getPersona();
    }

    private function getPersona() {
        $rel = parent::getObject(null, 'usuarios_personas', ['idUsuario' => $this->id]);
        $personas = new Personas;                
        $persona = $personas->buscarPorId($rel[0]->IdPersona);        
        $this->persona = $persona;
    }

}
