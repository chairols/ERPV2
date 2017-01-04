<?php

class ProvinciasBean {
    private $CI;
    private $id;
    private $provincia;
    private $activo;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'provincias_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function armarProvinciaPorID() {
        $where = array(
            'idprovincia' => $this->getId()
        );
        $datos = $this->CI->provincias_model->get_where($where);
        
        $this->provincia = $datos['provincia'];
        $this->activo = $datos['activo'];
        
    }
}

?>