<?php

class IrmBean {
    private $CI;
    private $id;
    private $proveedor;
    private $usuario;
    private $timestamp;
    private $items = array();
    
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
    
    public function getItems() {
        return $this->items;
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
    
    public function setItems($items) {
        $this->items[] = $items;
    }

    
    public function armarIRMporID() {
        $where = array(
            'idirm' => $this->getId()
        );
        $datos = $this->CI->irm_model->get_where($where);
        
        $this->proveedor = new ProveedoresBean();
        $this->proveedor->setId($datos['idproveedor']);
        $this->proveedor->armarProveedorPorID();
        
        $where = array(
            'idirm' => $this->id
        );
        $items = $this->CI->irm_model->gets_items_irm($where);
        
        foreach($items as $item) {
            $itemirm = new irmItemBean();
            $itemirm->setId($item['idirm_item']);
            $itemirm->armarIrmItemPorID();
            
            $this->items[] = $itemirm;
        }
    }
}
?>