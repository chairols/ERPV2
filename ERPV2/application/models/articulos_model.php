<?php

class Articulos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * articulos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('articulos', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * articulos/index
     * 
     * ots/agregar
     * ots/modificar
     * 
     * pedidos/agregar_items
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        articulos a,
                                        productos p
                                    WHERE
                                        a.idproducto = p.idproducto AND
                                        a.activo = '1'
                                    ORDER BY
                                        a.articulo");
        return $query->result_array();
    }
    
    public function gets_inactivos() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        articulos
                                    WHERE
                                        activo = '0'
                                    ORDER BY
                                        articulo");
        return $query->result_array();
    }
    
    /*
     * 
     * articulos/agregar
     * 
     * ots/pdf
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('articulos', $where);
        
        return $query->row_array();
    }
    
    public function update($datos, $idarticulo) {
        $id = array('idarticulo' => $idarticulo);
        $this->db->update('articulos', $datos, $id);
    }
}
?>