<?php

class ProveedoresBean {
    private $CI;
    private $id;
    private $proveedor;
    private $domicilio;
    private $cuit;
    private $telefono;
    private $localidad;
    private $provincia;
    private $contacto;
    private $correo;
    private $observaciones;
    
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'proveedores_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getProveedor() {
        return $this->proveedor;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getCuit() {
        return $this->cuit;
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
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setCuit($cuit) {
        $this->cuit = $cuit;
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

    public function armarProveedorPorID() {
        $where = array(
            'idproveedor' => $this->getId()
        );
        $datos = $this->CI->proveedores_model->get_where($where);
        
        $this->proveedor = $datos['proveedor'];
        $this->domicilio = $datos['domicilio'];
        $this->cuit = $datos['cuit'];
        $this->telefono = $datos['telefono'];
        $this->localidad = $datos['localidad'];
        
        $this->provincia = new ProvinciasBean();
        $this->provincia->setId($datos['idprovincia']);
        $this->provincia->armarProvinciaPorID();
        
        $this->contacto = $datos['contacto'];
        $this->correo = $datos['correo'];
        $this->observaciones = $datos['observaciones'];
    }
}
?>