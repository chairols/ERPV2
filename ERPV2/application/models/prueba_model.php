<?php

class Prueba_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($array) {
        $this->db->insert('prueba', $array);
    }
}
?>