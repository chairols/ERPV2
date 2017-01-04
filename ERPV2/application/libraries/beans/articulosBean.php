<?php

class ArticulosBean {
    private $CI;
    private $id;
    private $articulo;
    private $plano;
    private $producto;
    private $posicion;
    private $observaciones;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'articulos_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getArticulo() {
        return $this->articulo;
    }

    public function getPlano() {
        return $this->plano;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function getPosicion() {
        return $this->posicion;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setArticulo($articulo) {
        $this->articulo = $articulo;
    }

    public function setPlano($plano) {
        $this->plano = $plano;
    }

    public function setProducto($producto) {
        $this->producto = $producto;
    }

    public function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarArticuloPorID() {
        $where = array(
            'idarticulo' => $this->getId()
        );
        $datos = $this->CI->articulos_model->get_where($where);
        
        $this->setArticulo($datos['articulo']);
        
        $this->plano = new PlanosBean();
        $this->plano->setId($datos['idplano']);
        $this->plano->armarPlanoPorID();
        
        $this->producto = new ProductosBean();
        $this->producto->setId($datos['idproducto']);
        $this->producto->armarProductoPorID();
        
        $this->setPosicion($datos['posicion']);
        $this->setObservaciones($datos['observaciones']);
        $this->setActivo($datos['activo']);
        
    }
}
?>