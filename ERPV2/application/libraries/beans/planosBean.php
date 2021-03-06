<?php

class PlanosBean {
    private $CI;
    private $id;
    private $plano;
    private $urlDelPlano;
    private $revision;
    private $cliente;
    private $observaciones;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'planos_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getPlano() {
        return $this->plano;
    }

    public function getUrlDelPlano() {
        return $this->urlDelPlano;
    }

    public function getRevision() {
        return $this->revision;
    }
    
    public function getCliente() {
        return $this->cliente;
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

    public function setPlano($plano) {
        $this->plano = $plano;
    }

    public function setUrlDelPlano($urlDelPlano) {
        $this->urlDelPlano = $urlDelPlano;
    }

    public function setRevision($revision) {
        $this->revision = $revision;
    }
    
    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarPlanoPorID() {
        $where = array(
            'idplano' => $this->getId()
        );
        $datos = $this->CI->planos_model->get_where($where);
        
        if($this->getId() != 0) {
            $this->plano = $datos['plano'];
            $this->urlDelPlano = $datos['planofile'];
            $this->revision = $datos['revision'];
            
            $this->cliente = new ClientesBean();
            $this->cliente->setId($datos['idcliente']);
            $this->cliente->armarClientePorID();
            
            $this->observaciones = $datos['observaciones'];
            $this->activo = $datos['activo'];
        }
        
        
    }
}
?>