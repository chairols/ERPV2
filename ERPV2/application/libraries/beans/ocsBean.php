<?php

class OcsBean {
    private $CI;
    private $id;
    private $proveedor;
    private $moneda;
    private $timestamp;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'ocs_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getProveedor() {
        return $this->proveedor;
    }

    public function getMoneda() {
        return $this->moneda;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    public function setMoneda($moneda) {
        $this->moneda = $moneda;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarOcPorID() {
        $where = array(
            'idoc' => $this->id
        );
        $oc = $this->CI->ocs_model->get_where($where);
        
        $this->proveedor = new ProveedoresBean();
        $this->proveedor->setId($oc['idproveedor']);
        $this->proveedor->armarProveedorPorID();
        
        $this->moneda = new MonedasBean();
        $this->moneda->setId($oc['idmoneda']);
        $this->moneda->armarMonedaPorID();
        
        $this->timestamp = $oc['timestamp'];
        $this->activo = $oc['activo'];
        
    }
}
?>