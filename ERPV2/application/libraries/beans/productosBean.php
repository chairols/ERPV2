<?php

class ProductosBean {
    private $CI;
    private $id;
    private $producto;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'productos_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProducto($producto) {
        $this->producto = $producto;
    }

    public function armarProductoPorID() {
        $where = array(
            'idproducto' => $this->getId()
        );
        $datos = $this->CI->productos_model->get_where($where);
        
        $this->setProducto($datos['producto']);
    }    
}
?>