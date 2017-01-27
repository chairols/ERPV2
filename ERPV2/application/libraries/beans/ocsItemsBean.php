<?php
class OcsItemsBean {
    private $CI;
    private $id;
    private $cantidad;
    private $unidadDeMedida;
    private $articulo;
    private $precio;
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

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getUnidadDeMedida() {
        return $this->unidadDeMedida;
    }

    public function getArticulo() {
        return $this->articulo;
    }

    public function getPrecio() {
        return $this->precio;
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

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setUnidadDeMedida($unidadDeMedida) {
        $this->unidadDeMedida = $unidadDeMedida;
    }

    public function setArticulo($articulo) {
        $this->articulo = $articulo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarOcsItemsPorID() {
        $where = array(
            'idoc_item' => $this->id
        );
        $item = $this->CI->ocs_model->get_item_where($where);
        
        $this->cantidad = $item['cantidad'];
        
        $this->unidadDeMedida = new UnidadesDeMedidaBean();
        $this->unidadDeMedida->setId($item['idmedida']);
        $this->unidadDeMedida->armarUnidadDeMedidaPorID();
        
        $this->articulo = new ArticulosBean();
        $this->articulo->setId($item['idarticulo']);
        $this->articulo->armarArticuloPorID();
        
        $this->precio = $item['precio'];
        $this->timestamp = $item['timestamp'];
        $this->activo = $item['activo'];
    }
    
}
?>