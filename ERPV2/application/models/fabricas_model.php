<?php

class Fabricas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * fabricas/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('fabricas', $datos);
    }
    
    /*
     * 
     * fabricas/index
     * 
     * ots/agregar
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        fabricas
                                    ORDER BY
                                        idfabrica");
        return $query->result_array();
    }
    
    /*
     * 
     * fabricas/agregar 
     * 
     * ots/modificar
     * ots/pdf
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('fabricas', $where);
        
        return $query->row_array();
    }
}
?>
