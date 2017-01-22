<?php

class Planos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  articulos/agregar
     *  articulos/modificar
     * 
     *  planos/index
     */
    public function gets() {
        $query = $this->db->query("SELECT p.*, c.cliente
                                    FROM
                                        planos p
                                    LEFT JOIN
                                        clientes c
                                    ON  
                                        p.idcliente = c.idcliente
                                    WHERE
                                        p.activo = '1'");
        return $query->result_array();
    }
    
    /*
     * 
     *  articulos/ver
     *  planos/agregar 
     *  planos/ver 
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('planos', $where);
        
        return $query->row_array();
    }
    
    /*
     *  
     *  planos/borrados
     * 
     */
    public function gets_where($where) {
        $query = $this->db->get_where('planos', $where);
        
        return $query->result_array();
    }
    
    /*
     * 
     *  planos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('planos', $datos);
        return $this->db->insert_id();
    }
    
    
    /*
     *  
     *  planos/borrar
     *  planos/modificar
     * 
     */
    public function update($datos, $idplano) {
        $id = array('idplano' => $idplano);
        $this->db->update('planos', $datos, $id);
    }
}
?>