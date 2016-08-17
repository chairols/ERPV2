<?php

class Fabricas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * fabricas/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('fabricas', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * fabricas/index
     * 
     * ots/agregar
     * 
     * rfqs/agregar
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        fabricas
                                    ORDER BY
                                        fabrica");
        return $query->result_array();
    }
    
    /*
     * 
     * fabricas/agregar 
     * fabricas/modificar
     * 
     * numeroserie/trazabilidad
     * 
     * ots/modificar
     * ots/pdf
     * ots/ver
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('fabricas', $where);
        
        return $query->row_array();
    }
    
    /*
     * fabricas/modificar
     * 
     */
    public function update($datos, $idfabrica) {
        $id = array('idfabrica' => $idfabrica);
        $this->db->update('fabricas', $datos, $id);
    }
}
?>
