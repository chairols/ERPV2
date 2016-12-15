<?php

class Controles_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  controles/ajax_check_control
     */
    public function get_where($where) {
        $query = $this->db->get_where('controles', $where);
        
        return $query->row_array();
    }
    
    /*
     *  controles/agregar
     */
    public function set($datos) {
        $this->db->insert('controles', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  controles/index
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        controles
                                    WHERE   
                                        activo = '1'
                                    ORDER BY
                                        control");
        return $query->result_array();
    }
}
?>