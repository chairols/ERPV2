<?php

class Monedas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * monedas/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('monedas', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * monedas/index
     * 
     * numeroserie/trazabilidad
     * 
     * ots/trazabilidad
     * 
     * pedidos/agregar
     * 
     * retenciones/agregar
     * retenciones/agregar_items
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        monedas
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        moneda");
        return $query->result_array();  
    }
    
    /*
     * 
     * monedas/agregar
     * 
     * ocs/pdf
     * 
     * pedidos/agregar
     * pedidos/agregar_items
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('monedas', $where);
        
        return $query->row_array();
    }
}

?>