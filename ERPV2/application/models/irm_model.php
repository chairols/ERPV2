<?php

class Irm_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_pendienteirm($datos) {
        $this->db->insert('pendientesirm', $datos);
        return $this->db->insert_id();
    }
}
?>