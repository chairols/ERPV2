<?php

class Beans {
    public function __construct() {
        require_once 'beans/almacenesBean.php';
        require_once 'beans/articulosBean.php';
        require_once 'beans/clientesBean.php';
        require_once 'beans/controlesBean.php';
        require_once 'beans/fabricasBean.php';
        require_once 'beans/irmBean.php';
        require_once 'beans/irmItemBean.php';
        require_once 'beans/monedasBean.php';
        require_once 'beans/ocsBean.php';
        require_once 'beans/ocsItemsBean.php';
        require_once 'beans/otBean.php';
        require_once 'beans/planosBean.php';
        require_once 'beans/productosBean.php';
        require_once 'beans/proveedoresBean.php';
        require_once 'beans/provinciasBean.php';
        require_once 'beans/trazabilidadBean.php';
        require_once 'beans/unidadesdemedidaBean.php';
        require_once 'beans/usuariosBean.php';
    }
}

?>