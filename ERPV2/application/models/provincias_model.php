<?php

class Provincias_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * provincias/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('provincias', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * clientes/agregar
     * 
     * proveedores/agregar
     * 
     * provincias/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        provincias
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        provincia");
        return $query->result_array();
    }
    
    /*
     * 
     * pedidos/agregar_items
     * 
     * proveedores/agregar
     * 
     * provincias/agregar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('provincias', $where);
        
        return $query->row_array();
    }
}
?>