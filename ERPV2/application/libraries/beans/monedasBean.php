<?php

class MonedasBean {
    private $CI;
    private $id;
    private $moneda;
    private $simbolo;
    private $currency;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'monedas_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getMoneda() {
        return $this->moneda;
    }

    public function getSimbolo() {
        return $this->simbolo;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMoneda($moneda) {
        $this->moneda = $moneda;
    }

    public function setSimbolo($simbolo) {
        $this->simbolo = $simbolo;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarMonedaPorID() {
        $where = array(
            'idmoneda' => $this->id
        );
        $moneda = $this->CI->monedas_model->get_where($where);
        
        $this->moneda = $moneda['moneda'];
        $this->simbolo = $moneda['simbolo'];
        $this->currency = $moneda['currency'];
        $this->activo = $moneda['activo'];
    }
}
?>