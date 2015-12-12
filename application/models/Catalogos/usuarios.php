<?php require_once APPPATH.'/core/YPS_colecciones.php';

class Usuarios extends YPS_Colecciones{// implements iColecciones {
    const TABLA = 'usuarios';
    const OBJETO = 'modelUsuario';
    const PK = 'id';

    function __construct() {
        parent::__construct(self::TABLA,self::PK, SELF::OBJETO);        
        //$this->consultarTodo();
        //Este es el momento para ver si quiero cargar el catalogo
        //Cachear y demas.
    }
    function __destruct() {
        parent::__destruct();
    }

    public function consultarTodo() {
        return parent::consultarTodo();
    }
    public function buscarPorId($id) {
        $vRet = parent::buscarPorId($id);         
        return $vRet;
    }    
    public function guardar($data) {
        return parent::guardar($data);
    }
    public function consultarColeccion($where) {
        return parent::consultarColeccion($where);
    }
    public function papelera($data) {
        return parent::papelera($data);
    }
    public function eliminar($data) {
        return parent::eliminar($data);
    }
}
