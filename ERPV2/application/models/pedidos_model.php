<?php

class Pedidos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * pedidos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('pedidos', $datos);
        
        return $this->db->insert_id();
    }
    
    /*
     * 
     * pedidos/agregar_items
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('pedidos', $where);
        
        return $query->row_array();
    }
    
    /*
     * 
     * pedidos/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        pedidos p,
                                        clientes c,
                                        monedas m
                                    WHERE
                                        p.idcliente = c.idcliente AND
                                        p.idmoneda = m.idmoneda AND
                                        p.activo = 1");
        return $query->result_array();
    }
    
    /*
     * 
     * pedidos/agregar_items
     * 
     */
    public function set_item($item) {
        $this->db->insert('pedidos_items', $item);
        
        return $this->db->insert_id();
    }
    
    /*
     * 
     * pedidos/agregar_items
     * 
     */
    public function gets_items($idpedido) {
        $query = $this->db->query("SELECT *, pi.cantidad
                                    FROM
                                        pedidos_items pi,
                                        articulos a,
                                        productos p
                                    WHERE
                                        a.idproducto = p.idproducto AND
                                        pi.idarticulo = a.idarticulo AND
                                        pi.idpedido = '$idpedido'");
        return $query->result_array();
    }
    
    /*
     * 
     * pedidos/asociar_ot
     * 
     */
    public function get_item_where($idpedido_item) {
        $query = $this->db->query("SELECT pi.*, p.producto, a.articulo 
                                    FROM 
                                        pedidos_items pi,
                                        articulos a,
                                        productos p
                                    WHERE
                                        pi.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        pi.idpedido_item = $idpedido_item");
        return $query->row_array();
    }
}
?>