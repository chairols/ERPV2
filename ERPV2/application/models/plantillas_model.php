<?php

class Plantillas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * plantillas/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('plantillas', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        plantillas
                                    WHERE
                                        activo = '1'");
        return $query->result_array();
    }
}
?>