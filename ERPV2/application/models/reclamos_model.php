<?php

class Reclamos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  reclamos/agregar
     */
    public function set($datos) {
        $this->db->insert('reclamos', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  reclamos/agregar
     */
    public function set_item($datos) {
        $this->db->insert('reclamos_items', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  reclamos/index
     */
    public function gets() {
        $query = $this->db->query("SELECT r.timestamp, pr.producto, a.articulo, p.proveedor, r.reclamo, u.nombre, u.apellido, ri.idreclamo_item
                                    FROM
                                        reclamos r,
                                        reclamos_items ri,
                                        proveedores p,
                                        usuarios u,
                                        pendientesirm pi,
                                        ocs_items oi,
                                        articulos a,
                                        productos pr
                                    WHERE
                                        r.idreclamo = ri.idreclamo AND
                                        r.idproveedor = p.idproveedor AND
                                        r.idusuario = u.idusuario AND
                                        ri.idpendienteirm = pi.idpendienteirm AND
                                        pi.idoc_item = oi.idoc_item AND
                                        oi.idarticulo = a.idarticulo AND
                                        a.idproducto = pr.idproducto");
        
        return $query->result_array();
    }
}
?>