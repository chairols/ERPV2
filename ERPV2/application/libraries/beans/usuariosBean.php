<?php

class usuariosBean {
    private $CI;
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $usuario;
    private $password;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'usuarios_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function armarUsuarioPorID() {
        $where = array(
            'idusuario' => $this->id
        );
        $usuario = $this->CI->usuarios_model->get_where($where);
        
        $this->usuario = $usuario['usuario'];
        $this->password = $usuario['password'];
        $this->nombre = $usuario['nombre'];
        $this->apellido = $usuario['apellido'];
        $this->correo = $usuario['correo'];
    }
}
?>