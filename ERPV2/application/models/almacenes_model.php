<?php

class Almacenes_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  
     * almacenes/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        almacenes
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        almacen");
        return $query->result_array();
    }
}
?>