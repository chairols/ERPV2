<?php

class Marcas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * marcas/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        marcas
                                    WHERE   
                                        activo = '1'
                                    ORDER BY
                                        marca");
        return $query->result_array();
    }
}
?>