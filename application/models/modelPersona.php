<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ModelPersona extends YPS_Model {
   
    CONST OBJETO = 'modelPersona';
    CONST PK = 'idPersona';
    CONST TABLA = 'personas';
    
    private $idPersona;
    private $sufijo_nombre;
    private $prefijo_nombre;
    private $nombres;
    private $apellidos;
    private $tpo_documento;
    private $documento;
    private $sexo;
    private $direccion;
    private $ciudad;
    private $fecha_nacimiento;
    private $fotoURL;
    private $observacion;
    private $estado;
    private $eliminado;

    public function __construct() {
        parent::__construct(SELF::PK, SELF::TABLA);        
    }


public function magic($var = null, $valor = null){
        if (is_null($var)){return false;}
        if(is_null($valor)){
            return $this->$var;
        }else{
            $this->$var = $valor;
        }
    }

public function cargar($row) {
        parent::cargar($row);
        //Aqui debajo deben cargarse todas las relaciones simples.
//        $this->getPersona();
    }

//    public function getPersona() {
//        $rel = parent::getObject(null, 'usuarios_personas', ['idUsuario' => $this->id]);
//        //$this->CI->load->model("Catalogos/personas", 'mPersonas');
//        
//        $persona = new Personas;
//        $persona->buscarPorId($rel[0]->IdPersona);
//        echo "<pre>";
//        print_r($persona);
//        echo "</pre>";
//        die;
//        //return $this->persona;
//    }

}
