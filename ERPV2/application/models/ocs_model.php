<?php

class Ocs_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    
    /*
     * 
     * ocs/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('ocs', $datos);
        
        return $this->db->insert_id();
    }
    
    
    /*
     * 
     * ocs/agregar_items
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('ocs', $where);
        
        return $query->row_array();
    }
    
    
    /*
     *  ocs/agregar_items
     */
    public function set_item($item) {
        $this->db->insert('ocs_items', $item);
        
        return $this->db->insert_id();
    }
    
    /*
     *  ocs/agregar_items
     * 
     */
    public function gets_items($idoc) {
        $query = $this->db->query("SELECT oi.*, m.medida_corta, a.articulo, p.producto, o.numero_ot 
                                    FROM 
                                        ((((ocs_items oi inner join medidas m on oi.idmedida = m.idmedida)
                                        inner join articulos a on oi.idarticulo = a.idarticulo)
                                        inner join productos p on a.idproducto = p.idproducto)
                                        left join ots o on oi.idot = o.idot)
                                    WHERE 
                                        oi.idoc = '$idoc' AND
                                        oi.activo = '1'");
        
        return $query->result_array();
    }
    
    /*
     *  ocs/borrar_item
     */
    public function get_item_where($where) {
        $query = $this->db->get_where('ocs_items', $where);
        
        return $query->row_array();
    }
    
    /*
     *  ocs/borrar_item
     */
    public function update_item($datos, $id) {
        $array = array('idoc_item' => $id);
        $this->db->update('ocs_items', $datos, $array);
    }
}
?>