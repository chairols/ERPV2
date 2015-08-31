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
     * clientes/modificar
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
     * clientes/agregar
     * clientes/modificar
     * 
     * pedidos/agregar_items
     * 
     * proveedores/agregar
     * 
     * provincias/agregar
     * provincias/modificar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('provincias', $where);
        
        return $query->row_array();
    }
    
    
    /*
     * 
     *  provincias/modificar
     * 
     */
    public function update($datos, $id) {
        $array = array('idprovincia' => $id);
        $this->db->update('provincias', $datos, $array);
    }
}
?>