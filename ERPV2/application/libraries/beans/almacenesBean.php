<?php

class AlmacenesBean {
    private $id;
    private $almacen;
    
    public function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getAlmacen() {
        return $this->almacen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAlmacen($almacen) {
        $this->almacen = $almacen;
    }


    
    
}
?>