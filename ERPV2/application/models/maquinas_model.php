<?php

class Maquinas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_where($where) {
        $query = $this->db->get_where('maquinas', $where);
        
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('maquinas', $datos);
        return $this->db->insert_id();
    }
    
    
    public function gets() {
        $query = $this->db->query("SELECT m.idmaquina, ma.marca, m.modelo, tm.tipo_maquina, f.fabrica, m.estado
                                    FROM
                                        maquinas m,
                                        marcas ma,
                                        tipos_maquinas tm,
                                        fabricas f
                                    WHERE
                                        m.idmarca = ma.idmarca AND
                                        m.idtipo_maquina = tm.idtipo_maquina AND
                                        m.idfabrica = f.idfabrica");
        return $query->result_array();
    }
}
?>