<?php

class Roles_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  roles/agregar
     *  roles/menu
     */
    public function get_where($where) {
        $query = $this->db->get_where('roles', $where);
        
        return $query->row_array();
    }
    
    /*
     *  roles/agregar
     */
    public function set($datos) {
        $this->db->insert('roles', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  roles/index
     *  
     *  usuarios/agregar
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        roles
                                    ORDER BY
                                        rol");
        return $query->result_array();
    }
}
?>