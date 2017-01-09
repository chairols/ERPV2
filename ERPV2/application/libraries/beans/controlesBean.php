<?php

class ControlesBean {
    private $CI;
    private $id;
    private $control;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'controles_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getControl() {
        return $this->control;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setControl($control) {
        $this->control = $control;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarControlPorID() {
        $where = array(
            'idcontrol' => $this->id
        );
        $datos = $this->CI->controles_model->get_where($where);
        
        $this->control = $datos['control'];
        $this->activo = $datos['activo'];
    }
}
?>