<?php

class Materiales_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * productos/agregar
     * 
     *
    public function set($datos) {
        $this->db->insert('productos', $datos);
    }*/
    
    /*
     * 
     *     ********************     articulos/agregar
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
     * ots/pdf
     * 
     * productos/agregar
     * 
     *
    public function get_where($where) {
        $query = $this->db->get_where('productos', $where);
        
        return $query->row_array();
    }*/
}
?>