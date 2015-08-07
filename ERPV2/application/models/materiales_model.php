<?php

class Materiales_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * materiales/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('materiales', $datos);
    }
    
    /*
     * 
     * materiales/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        materiales
                                    ORDER BY
                                        material");
        return $query->result_array();
    }
    
    /*
     * 
     *  materiales/agregar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('materiales', $where);
        
        return $query->row_array();
    }
}
?>