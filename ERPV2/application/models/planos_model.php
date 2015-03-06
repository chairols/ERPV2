<?php

class Planos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  planos/index
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        planos
                                    WHERE
                                        activo = '1'");
        return $query->result_array();
    }
    
    /*
     * 
     *  articulos/ver
     *  planos/agregar 
     *  
     */
    public function get_where($where) {
        $query = $this->db->get_where('planos', $where);
        
        return $query->row_array();
    }
    
    /*
     * 
     *  planos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('planos', $datos);
        return $this->db->insert_id();
    }
}
?>