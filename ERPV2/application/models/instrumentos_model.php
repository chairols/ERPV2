<?php

class Instrumentos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  instrumentos/agregar
     */
    public function set($datos) {
        $this->db->insert('instrumentos', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  instrumentos/index
     */
    public function gets() {
        $query = $this->db->query("SELECT i.*, m.marca
                                    FROM
                                        instrumentos i,
                                        marcas m
                                    WHERE
                                        i.idmarca = m.idmarca AND
                                        i.activo = '1'");
        return $query->result_array();
    }
    
    /*
     *  instrumentos/modificar
     */
    public function get_where($where) {
        $query = $this->db->get_where('instrumentos', $where);
        
        return $query->row_array();
    }
}
?>