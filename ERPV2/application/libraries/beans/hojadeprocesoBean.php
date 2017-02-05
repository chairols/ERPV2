<?php

class HojaDeProcesoBean {
    private $CI;
    private $id;
    private $hojaDeProceso;
    private $urlEditable;
    private $revisiones = array();
    private $timestamp;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getHojaDeProceso() {
        return $this->hojaDeProceso;
    }

    public function getUrlEditable() {
        return $this->urlEditable;
    }

    public function getRevisiones() {
        return $this->revisiones;
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

    public function setHojaDeProceso($hojaDeProceso) {
        $this->hojaDeProceso = $hojaDeProceso;
    }

    public function setUrlEditable($urlEditable) {
        $this->urlEditable = $urlEditable;
    }

    public function setRevisiones($revisiones) {
        $this->revisiones = $revisiones;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarHojaDeProcesoPorID() {
        $where = array(
            'idhojadeproceso' => $this->id
        );
        
    }
}
?>