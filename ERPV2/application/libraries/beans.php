<?php

class Beans {
    public function __construct() {
        require_once 'beans/almacenesBean.php';
        require_once 'beans/articulosBean.php';
        require_once 'beans/fabricasBean.php';
        require_once 'beans/irmBean.php';
        require_once 'beans/otBean.php';
        require_once 'beans/planosBean.php';
        require_once 'beans/productosBean.php';
        require_once 'beans/proveedoresBean.php';
        require_once 'beans/provinciasBean.php';
        require_once 'beans/trazabilidadBean.php';
    }
}

?>