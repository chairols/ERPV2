<?php

class Almacenes_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  
     * almacenes/index
     * 
     * stock/almacenes
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        almacenes
                                    WHERE
                                        activo = '1'
                                    ORDER BY
                                        almacen");
        return $query->result_array();
    }
    
    
    /*
     * almacenes/agregar
     * almacenes/modificar
     * almacenes/ver
     * 
     * stock/almacenes
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('almacenes', $where);
        
        return $query->row_array();
    }
    
    
    /*
     * almacenes/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('almacenes', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * almacenes/modificar
     * 
     */
    public function update($datos, $id) {
        $array = array('idalmacen' => $id);
        $this->db->update('almacenes', $datos, $array);
    }
}
?>