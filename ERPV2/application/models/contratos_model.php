<?php

class Contratos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * contratos/agregar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('contratos', $where);
        
        return $query->row_array();
    }
    
    /*
     * 
     * contratos/agregar
     */
    public function set($datos) {
        $this->db->insert('contratos', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * contratos/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        contratos co,
                                        clientes cl
                                    WHERE
                                        co.idcliente = cl.idcliente AND
                                        co.activo = '1'");
        return $query->result_array();
    }
    
    /*
     *  dashboard/index
     */
    public function gets_contratos_vigentes() {
        $query = $this->db->query("SELECT * 
                                    FROM 
                                        contratos
                                    WHERE 
                                        vigencia_hasta > '".date("Y-m-d", mktime())."' AND
                                        vigencia_desde < '".date("Y-m-d", mktime())."' AND 
                                            activo = '1'");
        return $query->result_array();
    }
}
?>