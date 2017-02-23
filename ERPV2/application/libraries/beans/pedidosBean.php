<?php

class PedidosBean {
    private $CI;
    private $id;
    private $cliente;
    private $moneda;
    private $ordenDeCompra;
    private $adjunto;
    private $timestamp;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'pedidos_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getMoneda() {
        return $this->moneda;
    }

    public function getOrdenDeCompra() {
        return $this->ordenDeCompra;
    }

    public function getAdjunto() {
        return $this->adjunto;
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

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setMoneda($moneda) {
        $this->moneda = $moneda;
    }

    public function setOrdenDeCompra($ordenDeCompra) {
        $this->ordenDeCompra = $ordenDeCompra;
    }

    public function setAdjunto($adjunto) {
        $this->adjunto = $adjunto;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarPedidoPorID() {
        $where = array(
            'idpedido' => $this->id
        );
        $pedido = $this->CI->pedidos_model->get_where($where);
        
        $this->cliente = new ClientesBean();
        $this->cliente->setId($pedido['idcliente']);
        $this->cliente->armarClientePorID();
        
        $this->moneda = new MonedasBean();
        $this->moneda->setId($pedido['idmoneda']);
        $this->moneda->armarMonedaPorID();
    }
}

?>