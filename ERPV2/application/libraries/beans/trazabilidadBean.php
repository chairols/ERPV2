<?php

class TrazabilidadBean {
    private $CI;
    private $idot;
    private $ot;
    private $pedidosItems = array();
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'ots_model'
        ));
    }
    
    public function getOt() {
        return $this->ot;
    }
    
    function getPedidosItems() {
        return $this->pedidosItems;
    }
    
    public function setOt($ot) {
        $this->ot = $ot;
    }
    
    public function setIdot($idot) {
        $this->idot = $idot;
    }
    
    function setPedidosItems($pedidosItems) {
        $this->pedidosItems[] = $pedidosItems;
    }
        
    public function armarTrazabilidadPorOt() {
        $this->ot = new otBean();
        $this->ot->setId($this->idot);
        $this->ot->armarOTporID();
        
        $ped = $this->CI->ots_model->gets_pedidos_asociados($this->idot);
        foreach($ped as $p) {
            $pedidoitem = new PedidosItemBean();
            $pedidoitem->setId($p['idpedido_item']);
            
            $pedidoitem->setCantidad($p['cantidad']);
            
            $articulo = new ArticulosBean();
            $articulo->setId($p['idarticulo']);
            $articulo->armarArticuloPorID();
            $pedidoitem->setArticulo($articulo);
            
            /*
            $pedido = new PedidosBean();
            $pedido->setId($p['idpedido']);
            $pedido->armarPedidoPorID();
            $pedidoitem->setPedido($pedido);
            */
            
            $pedidoitem->setPrecio($p['precio']);
            
            $this->setPedidosItems($pedidoitem);
        }
        
        
    }
}
?>