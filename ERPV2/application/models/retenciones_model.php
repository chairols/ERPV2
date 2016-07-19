<?php

class Retenciones_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * retenciones/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('retenciones', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * retenciones/agregar_items
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('retenciones', $where);
        
        return $query->row_array();
    }
    
    /*
     *  retenciones/agregar_items
     * 
     */
    public function set_item($datos) {
        $this->db->insert('retenciones_items', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  retenciones/agregar_items
     * 
     */
    public function gets_items($idretencion) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        retenciones_items 
                                    WHERE
                                        idretencion = '$idretencion'");
        return $query->result_array();
    }
}
?>