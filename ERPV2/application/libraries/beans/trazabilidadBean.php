<?php

class TrazabilidadBean {
    private $CI;
    private $ot;
    private $idot;
    
    public function __construct() {
        $this->CI =& get_instance();
    }
    
    public function getOt() {
        return $this->ot;
    }

    public function setOt($ot) {
        $this->ot = $ot;
    }
    
    public function setIdot($idot) {
        $this->idot = $idot;
    }

        
    public function armarTrazabilidadPorOt() {
        $this->ot = new otBean();
        $this->ot->setId($this->idot);
        $this->ot->armarOTporID();
        
    }
}
?>