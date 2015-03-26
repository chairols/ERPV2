<?php

class Medidas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     *  medidas/agregar
     */
    public function set($datos) {
        $this->db->insert('medidas', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * medidas/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        medidas
                                    WHERE
                                        activo = 1
                                    ORDER BY
                                        medida_corta");
        return $query->result_array();
    }
}
?>