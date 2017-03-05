<?php

class Reclamos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  reclamos/agregar
     */
    public function set($datos) {
        $this->db->insert('reclamos', $datos);
        return $this->db->insert_id();
    }
    
    
    public function set_item($datos) {
        $this->db->insert('reclamos_items', $datos);
        return $this->db->insert_id();
    }
}
?>