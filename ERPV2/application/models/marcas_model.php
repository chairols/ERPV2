<?php

class Marcas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * marcas/index
     * 
     * stock/agregar
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        marcas
                                    WHERE   
                                        activo = '1'
                                    ORDER BY
                                        marca");
        return $query->result_array();
    }
    
    /*
     * 
     *  marcas/agregar
     *  marcas/ver
     * 
     *  stock/almacenes
     *  stock/editar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('marcas', $where);
        
        return $query->row_array();
    }
    
    
    /*
     * 
     * marcas/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('marcas', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  marcas/modificar
     *  marcas/borrar
     */
    public function update($datos, $idmarca) {
        $id = array('idmarca' => $idmarca);
        $this->db->update('marcas', $datos, $id);
    }
    
    
    /*
     * 
     * marcas/borradas
     * 
     */
    public function gets_where($where) {
        $query = $this->db->get_where('marcas', $where);
        
        return $query->result_array();
    }
}
?>