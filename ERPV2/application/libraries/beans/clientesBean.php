<?php

class ClientesBean {
    private $CI;
    private $id;
    private $cliente;
    private $domicilio;
    private $telefono;
    private $localidad;
    private $provincia;
    private $contacto;
    private $correo;
    private $observaciones;
    private $activo;
    private $timestamp;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'clientes_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getContacto() {
        return $this->contacto;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function armarClientePorID() {
        $where = array(
            'idcliente' => $this->id
        );
        $datos = $this->CI->clientes_model->get_where($where);
        
        if($this->id) {
        
            $this->setCliente($datos['cliente']);
            $this->domicilio = $datos['domicilio'];
            $this->telefono = $datos['telefono'];
            $this->localidad = $datos['localidad'];
            /*
             *  provincia
             */
            $this->contacto = $datos['contacto'];
            $this->correo = $datos['correo'];
            $this->observaciones = $datos['observaciones'];
            $this->activo = $datos['activo'];
            $this->timestamp = $datos['timestamp'];
        }
         
    }
}
?>