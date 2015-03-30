<?php

class Clientes_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * clientes/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('clientes', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * clientes/index
     * 
     * pedidos/agregar
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        clientes
                                    ORDER BY
                                        cliente");
        return $query->result_array();
    }
    
    /*
     * 
     * clientes/agregar
     * clientes/modificar
     * 
     * pedidos/agregar
     * pedidos/agregar_items
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('clientes', $where);
        
        return $query->row_array();
    }
    
    /*
     * 
     * clientes/modificar
     * 
     */
    public function update($datos, $idcliente) {
        $id = array('idcliente' => $idcliente);
        $this->db->update('clientes', $datos, $id);
    }
}
?>
