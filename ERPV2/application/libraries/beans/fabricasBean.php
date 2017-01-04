<?php

class FabricasBean {
    private $CI;
    private $id;
    private $fabrica;
    private $direccion;
    private $localidad;
    private $timestamp;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'fabricas_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function armarFabricaPorID() {
        $where = array(
            'idfabrica' => $this->id
        );
        $datos = $this->CI->fabricas_model->get_where($where);
        
        $this->fabrica = $datos['fabrica'];
        $this->direccion = $datos['direccion'];
        $this->localidad = $datos['localidad'];
        $this->telefono = $datos['telefono'];
        $this->timestamp = $datos['timestamp'];
        $this->activo = $datos['activo'];
    }
    
    public function getFabrica() {
        return $this->fabrica;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function getActivo() {
        return $this->activo;
    }


}
?>