<?php

class Productos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * productos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('productos', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * articulos/agregar
     * articulos/modificar
     * 
     * productos/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        productos
                                    ORDER BY
                                        producto");
        return $query->result_array();
    }
    
    /*
     * 
     * articulos/ver
     * 
     * numeroserie/trazabilidad
     * 
     * ocs/asociar_ot
     * ots/pdf
     * ots/get_ot_ajax
     * 
     * productos/agregar
     * 
     * stock/almacenes
     * stock/editar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('productos', $where);
        
        return $query->row_array();
    }
    
    
    /*
     *  productos/modificar
     */
    public function update($datos, $idproducto) {
        $id = array('idproducto' => $idproducto);
        $this->db->update('productos', $datos, $id);
    }
}
?>