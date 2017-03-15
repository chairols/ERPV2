<?php 

class Imagenes_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('imagenes', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        imagenes
                                    WHERE
                                        activo = '1'");
        return $query->result_array();
    }
}