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
     * medidas/editar_item
     * 
     * stock/agregar
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
    
    
    /*
     *  stock/almacenes
     *  stock/modificar
     *  stock/editar
     */
    public function get_where($where) {
        $query = $this->db->get_where('medidas', $where);
        
        return $query->row_array();
    }
}
?>