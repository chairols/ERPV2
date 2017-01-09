<?php

class irmItemBean {
    private $CI;
    private $id;
    private $articulo;
    private $cantidad;
    private $certificado;
    private $usuario;
    private $timestamp;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'irm_model',
            'ocs_model'
        ));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getArticulo() {
        return $this->articulo;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getCertificado() {
        return $this->certificado;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setArticulo($articulo) {
        $this->articulo = $articulo;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setCertificado($certificado) {
        $this->certificado = $certificado;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function armarIrmItemPorID() {
        $where = array(
            'idirm_item' => $this->id
        );
        $item = $this->CI->irm_model->get_where_item_irm($where);
        
        $where = array(
            'idoc_item' => $item['idoc_item']
        );
        $oc_item = $this->CI->ocs_model->get_item_where($where);
        
        $this->articulo = new ArticulosBean();
        $this->articulo->setId($oc_item['idarticulo']);
        $this->articulo->armarArticuloPorID();
        
        $this->cantidad = $item['cantidad'];
        $this->certificado = $item['certificado'];
        
        $this->usuario = new usuariosBean();
        $this->usuario->setId($item['idusuario']);
        $this->usuario->armarUsuarioPorID();
        
        $this->timestamp = $item['timestamp'];
    }
}
?>