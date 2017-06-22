<?php

class Hojasdeproceso_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_ultimo_id() {
        $query = $this->db->query("SELECT MAX(idhojadeproceso) as id
                                    FROM
                                        hojasdeproceso");
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('hojasdeproceso', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        
    }
}
?>