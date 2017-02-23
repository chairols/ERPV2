<?php

class PedidosItemBean {
    private $CI;
    private $id;
    private $pedido;
    private $cantidad;
    private $articulo;
    private $precio;
    private $ot;


    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'pedidos_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getPedido() {
        return $this->Pedido;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getArticulo() {
        return $this->articulo;
    }

    public function getPrecio() {
        return $this->precio;
    }
    
    public function getOt() {
        return $this->ot;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPedido($pedido) {
        $this->pedido = $pedido;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setArticulo($articulo) {
        $this->articulo = $articulo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    public function setOt($ot) {
        $this->ot = $ot;
    }

    public function armarPedidosItemPorOT() {
        $idot = $this->ot->getId();
        
        
        
    }
    
}
?>