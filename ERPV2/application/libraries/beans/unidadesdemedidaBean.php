<?php

class UnidadesDeMedidaBean {
    private $CI;
    private $id;
    private $medidaCorta;
    private $medidaLarga;
    private $activo;
    private $timestamp;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'medidas_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getMedidaCorta() {
        return $this->medidaCorta;
    }

    public function getMedidaLarga() {
        return $this->medidaLarga;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMedidaCorta($medidaCorta) {
        $this->medidaCorta = $medidaCorta;
    }

    public function setMedidaLarga($medidaLarga) {
        $this->medidaLarga = $medidaLarga;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function armarUnidadDeMedidaPorID() {
        $where = array(
            'idmedida' => $this->id
        );
        $datos = $this->CI->medidas_model->get_where($where);
        
        $this->medidaCorta = $datos['medida_corta'];
        $this->medidaLarga = $datos['medida_larga'];
        $this->activo = $datos['activo'];
        $this->timestamp = $datos['timestamp'];
    }
    
}