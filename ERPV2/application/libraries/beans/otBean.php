<?php

class otBean {
    private $CI;
    private $id;
    private $fabrica;
    private $numeroOrdenDeTrabajo;
    private $cantidad;
    private $articulo;
    private $fechaDeNecesidad;
    private $fechaDeTerminado;
    private $observaciones;
    private $timestamp;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'ots_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getFabrica() {
        return $this->fabrica;
    }
    
    function getNumeroOrdenDeTrabajo() {
        return $this->numeroOrdenDeTrabajo;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getArticulo() {
        return $this->articulo;
    }

    function getFechaDeNecesidad() {
        return $this->fechaDeNecesidad;
    }

    function getFechaDeTerminado() {
        return $this->fechaDeTerminado;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function setFabrica($fabrica) {
        $this->fabrica = $fabrica;
    }

    function setNumeroOrdenDeTrabajo($numeroOrdenDeTrabajo) {
        $this->numeroOrdenDeTrabajo = $numeroOrdenDeTrabajo;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setArticulo($articulo) {
        $this->articulo = $articulo;
    }

    function setFechaDeNecesidad($fechaDeNecesidad) {
        $this->fechaDeNecesidad = $fechaDeNecesidad;
    }

    function setFechaDeTerminado($fechaDeTerminado) {
        $this->fechaDeTerminado = $fechaDeTerminado;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function armarOTporID() {
        $datos = array(
            'idot' => $this->id
        );
        $ot = $this->CI->ots_model->get_where($datos);
        
        $this->fabrica = new FabricasBean(); 
        $this->fabrica->setId($ot['idfabrica']);
        $this->fabrica->armarFabricaPorID();
        
        $this->setNumeroOrdenDeTrabajo($ot['numero_ot']);
        
        $this->setCantidad($ot['cantidad']);

        $this->articulo = new ArticulosBean();
        $this->articulo->setId($ot['idarticulo']);
        $this->articulo->armarArticuloPorID();
        
        
        
        $this->fechaDeNecesidad = $ot['fecha_necesidad'];
        
        $this->timestamp = $ot['timestamp'];
    }

}

?>