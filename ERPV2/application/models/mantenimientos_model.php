<?php

class Mantenimientos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('mantenimientos', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        $query = $this->db->query("SELECT m.*, tm.tipo_maquina, mar.marca, ma.modelo
                                    FROM
                                        mantenimientos m,
                                        maquinas ma,
                                        tipos_maquinas tm,
                                        marcas mar
                                    WHERE
                                        m.idmaquina = ma.idmaquina AND
                                        ma.idtipo_maquina = tm.idtipo_maquina AND
                                        ma.idmarca = mar.idmarca AND
                                        m.activo = '1'");
        return $query->result_array();
    }
    
    public function get_where($where) {
        $query = $this->db->get_where('mantenimientos', $where);
        
        return $query->row_array();
    }
}
?>