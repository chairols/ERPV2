<?php

class Padron_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }
    
    public function conectar() {
        $this->load->database();
    }
    
    public function limpiar_base() {
        $query = $this->db->query("TRUNCATE TABLE padron");
    }
    
    public function set($datos) {
        $this->db->insert('padron', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  retenciones/agregar_items
     */
    public function get_where($where) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        padron
                                    WHERE
                                        cuit like '%$where%'");
        
        return $query->result_array();
    }
    
    public function get_where_exacto($where) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        padron
                                    WHERE
                                        cuit like '$where'");
        
        return $query->result_array();
    }
}
?>