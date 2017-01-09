<?php

class Irm_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  ocs/agregar_item
     */
    public function set_pendienteirm($datos) {
        $this->db->insert('pendientesirm', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  ocs/borrar_item
     */
    public function update_itempendienteirm_por_idoc_item($datos, $id) {
        $array = array('idoc_item' => $id);
        $this->db->update('pendientesirm', $datos, $array);
    }
    
    /*
     *  irm/agregar_items
     */
    public function update_pendientesirm($datos, $id) {
        $array = array('idpendienteirm' => $id);
        $this->db->update('pendientesirm', $datos, $array);
    }
    /*
     * irm/agregar
     */
    public function set($datos) {
        $this->db->insert('irm', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  irm/pendientes
     */
    public function gets_pendientes_de_recepcion() {
        $query = $this->db->query("SELECT pirm.cantidadpendiente, a.articulo, o.timestamp as fecha, p.proveedor
                                    FROM
                                        pendientesirm pirm,
                                        ocs_items oi,
                                        articulos a,
                                        ocs o,
                                        proveedores p
                                    WHERE
                                        pirm.idoc_item = oi.idoc_item AND
                                        oi.idarticulo = a.idarticulo AND
                                        oi.idoc = o.idoc AND
                                        o.idproveedor = p.idproveedor AND
                                        pirm.pendiente = 1 AND
                                        pirm.activo = 1");
        
        return $query->result_array();
    }
    
    /*
     * 
     */
    public function gets_proveedores_con_irm_pendientes() {
        $query = $this->db->query("SELECT p.idproveedor, p.proveedor
                                    FROM 
                                        pendientesirm pirm,
                                        ocs_items oi,
                                        ocs o,
                                        proveedores p
                                    WHERE
                                        pirm.idoc_item = oi.idoc_item AND
                                        oi.idoc = o.idoc AND
                                        o.idproveedor = p.idproveedor AND
                                        pirm.pendiente = 1 AND
                                        pirm.activo = 1
                                    GROUP BY
                                        p.idproveedor");
        return $query->result_array();
    }
    
    /*
     *  beans/irmBean
     */
    public function get_where($where) {
        $query = $this->db->get_where('irm', $where);
        
        return $query->row_array();
    }
    
    
    public function gets_items_pendientes_por_proveedor($idproveedor) {
        $query = $this->db->query("SELECT pi.*, a.articulo, p.producto
                                    FROM
                                        pendientesirm pi,
                                        ocs_items oi,
                                        ocs o,
                                        articulos a,
                                        productos p
                                    WHERE
                                        pi.idoc_item = oi.idoc_item AND
                                        oi.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        pi.pendiente = '1' AND
                                        pi.activo = '1' AND
                                        oi.idoc = o.idoc AND
                                        o.idproveedor = '$idproveedor'");
        
        return $query->result_array();
    }
    
    
    public function get_where_pendienteirm($where) {
        $query = $this->db->get_where('pendientesirm', $where);
        
        return $query->row_array();
    }
    
    /*
     *  irm/agregar_items
     */
    public function set_irm_item($datos) {
        $this->db->insert('irm_items', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * irm/agregar_items
     */
    public function gets_items_irm($where) {
        $query = $this->db->get_where('irm_items', $where);
        
        return $query->result_array();
    }
    
    public function get_where_item_irm($where) {
        $query = $this->db->get_where('irm_items', $where);
        
        return $query->row_array();
    }
}
?>