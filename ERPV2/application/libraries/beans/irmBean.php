<?php

class IrmBean {
    private $CI;
    private $id;
    private $proveedor;
    private $usuario;
    private $timestamp;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'irm_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getProveedor() {
        return $this->proveedor;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function armarIRMporID() {
        $where = array(
            'idirm' => $this->getId()
        );
        $datos = $this->CI->irm_model->get_where($where);
        
        $this->proveedor = new ProveedoresBean();
        $this->proveedor->setId($datos['idproveedor']);
        $this->proveedor->armarProveedorPorID();
        
    }
}
?>