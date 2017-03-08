<?php

class Tipos_maquinas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_where($where) {
        $query = $this->db->get_where('tipos_maquinas', $where);
        
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('tipos_maquinas', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        tipos_maquinas
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        tipo_maquina");
        return $query->result_array();
    }
}
?>