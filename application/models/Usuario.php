<?php

/**
 * @author Sibarita
 * @version 1.0
 * @created 03-jul-2014 11:39:32 a.m.
 */
class Usuario extends CI_Model {

    public $idUsuario;
    public $apellido;
    public $ciudad;
    private $contraseña;
    public $cp;
    public $direccion;
    public $dni;
    public $eliminado;
    public $email;
    public $fec_altaUsuario;
    public $fotoURL;
    public $nombre;
    public $pais;
    public $publicado;
    public $sexo;
    public $telefono;
    public $usuario;
    public $comentario;

    function __destruct() {
        $this->idUsuario = "";
        $this->apellido = "";
        $this->ciudad = "";
        $this->contraseña = "";
        $this->cp = "";
        $this->direccion = "";
        $this->dni = "";
        $this->eliminado = "";
        $this->email = "";
        $this->fec_altaUsuario = "";
        $this->fotoURL = "";
        $this->nombre = "";
        $this->pais = "";
        $this->publicado = "";
        $this->sexo = "";
        $this->telefono = "";
        $this->usuario = "";
        $this->comentario = "";
    }

    public function __construct() {
        parent::__construct();
        $idUsuario = "";
        $apellido = "";
        $ciudad = "";
        $contraseña = "";
        $cp = "";
        $direccion = "";
        $dni = "";
        $eliminado = "";
        $email = "";
        $fec_altaUsuario = "";
        $fotoURL = "";
        $nombre = "";
        $pais = "";
        $publicado = "";
        $sexo = "";
        $telefono = "";
        $usuario = "";
        $comentario = "";
    }

    
    public function cargarUsuario($id){
        //revisar en la base de datos cuando se vacie que el dni sea unique...
        //momentaneamente no lo es ya que hay datos de prueba y el mismo se agrego a posteriori.        
        parent::__construct();                
         $sql="
         SELECT 
         A.idUsuario, A.apellido, A.dni, B.cpnuevo as cp, B.nom_ciudad as ciudad, C.nom_provincia as provincia, A.nomAcceso as usuario, A.passAcceso, A.direccion, A.dni, A.eliminado,
         A.emailpref as email, A.fec_altaUsuario, A.fotoURL, A.nombre, D.nom_pais as pais, A.publicado, A.sexo,
         A.telpref as telefono, A.comentario 
         FROM usuarios A
         INNER JOIN ciudades B ON
         B.nroLocalidad = A.nrociudad
         INNER JOIN provincias C ON
         B.cod_provincia = C.cod_provincia
         INNER JOIN paises D ON
         C.cod_pais = D.cod_pais
         WHERE idUsuario = ".$id;
                
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
           //echo "<pre>";print_r($query->row());exit();//Revisar consulta.        
        $t_user = $query->row();
        $this->idUsuario = $t_user->idUsuario;
        $this->apellido = $t_user->apellido;        
        $this->ciudad = $t_user->ciudad;
        $this->contraseña = $t_user->passAcceso;
        $this->cp = $t_user-> cp;
        $this->direccion = $t_user->direccion;
        $this->dni = $t_user->dni;
        $this->eliminado = $t_user->eliminado;
        $this->email = $t_user->email;
        $this->fec_altaUsuario = $t_user->fec_altaUsuario;
        $this->fotoURL = $t_user->fotoURL;
        $this->nombre = $t_user->nombre;
        $this->pais = $t_user->pais;
        $this->publicado = $t_user->publicado;
        $this->sexo = $t_user->sexo;
        $this->telefono = $t_user->telefono;
        $this->usuario = $t_user->usuario;
        $this->comentario = $t_user->comentario;    
        
        }
        
        
        
        
        
    }
    public function obtenerUsuario($select = null, $where = null, $fetch = null) {
        if (is_array($select)) {
            $this->db->select($select);
        }
        if (is_array($where)) {
            $this->db->where($where);
        }
        if ($fetch == 'object') {
            return $this->db->get('usuarios')->result();
        }
        return $this->db->get('usiarios')->result_array();
    }
    public function eliminarUsuario(){ 
//        $query="DELETE FROM usuarios WHERE id_usuario = :id_usuario"; 
//        try 
//        { 
//            $comando = DB::getInstance()->prepare($query); 
//            $rows = $comando->execute(array(':id_usuario' => $this->getIdUsuario())); 
//            if( $rows == 1 ){echo 'DELETE correcto';} 
//        } 
//        catch(PDOException $e) 
//        { 
//            echo 'Error: ' . $e->getMessage(); 
//        } 
    }     
    public function editarUsuario(){ 
//        try 
//        { 
//            $comando = DB::getInstance()->prepare('UPDATE usuarios SET nombre = :nombre, apellido = :apellido, usuario = :usuario, pass = :pass, rol = :rol, email = :email, telefono = :telefono, activo = :activo WHERE id_usuario = :id_usuario'); 
//            $rows = $comando->execute(array(':nombre' => $this->getNombre(), ':apellido' => $this->getApellido(), ':usuario' => $this->getUsuario(), ':pass' => md5($this->getPass()), ':rol' => $this->getRol(), ':email' => $this->getEmail(), ':telefono' => $this->getTelefono(), ':activo' => $this->getActivo(), ':id_usuario' => $this->getIdUsuario())); 
//            if( $rows == 1 ){echo 'UPDATE correcto';} 
//        } 
//        catch(PDOException $e) 
//        { 
//            echo 'Error: ' . $e->getMessage(); 
//        } 
    }
    
}
