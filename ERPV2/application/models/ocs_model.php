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
     * ocs/pdf
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
     *  ocs/index
     */
    public function gets() {
        $query = $this->db->query("SELECT o.*, m.simbolo, p.proveedor, oi.idoc_item, oi.cantidad, med.medida_corta, a.idarticulo, a.articulo, prod.producto
                                    FROM
                                        ocs o,
                                        monedas m,
                                        proveedores p,
                                        ocs_items oi,
                                        medidas med,
                                        articulos a,
                                        productos prod
                                    WHERE
                                        o.idproveedor = p.idproveedor AND
                                        o.idmoneda = m.idmoneda AND
                                        o.idoc = oi.idoc AND
                                        oi.idmedida = med.idmedida AND
                                        oi.idarticulo = a.idarticulo AND
                                        a.idproducto = prod.idproducto AND
                                        oi.activo = 1");
        return $query->result_array();
    }
    
    /*
     *  ocs/agregar_items
     * 
     */
    public function gets_items($idoc) {
        $query = $this->db->query("SELECT oi.*, m.medida_corta, a.articulo, p.producto
                                    FROM 
                                        (((ocs_items oi inner join medidas m on oi.idmedida = m.idmedida)
                                        inner join articulos a on oi.idarticulo = a.idarticulo)
                                        inner join productos p on a.idproducto = p.idproducto)
                                    WHERE 
                                        oi.idoc = '$idoc' AND
                                        oi.activo = '1'");
        
        return $query->result_array();
    }
    
    /*
     *  ocs/asociar_ot
     *  ocs/borrar_item
     *  ocs/editar_item
     */
    public function get_item_where($where) {
        $query = $this->db->get_where('ocs_items', $where);
        
        return $query->row_array();
    }
    
    /*
     *  ocs/borrar_item
     *  ocs/editar_item
     */
    public function update_item($datos, $id) {
        $array = array('idoc_item' => $id);
        $this->db->update('ocs_items', $datos, $array);
    }
    
    /*
     * 
     *  ocs/asociar_ot
     * 
     */
    public function asociar_ot($datos) {
        $this->db->insert('ocs_items_ots', $datos);
    }
    
    /*
     *  ocs/asociar_ot
     */
    public function gets_ots_asociadas($idoc_item) {
        $query = $this->db->query("SELECT oio.*, f.fabrica, o.numero_ot, o.cantidad, a.articulo, p.producto
                                    FROM
                                        ocs_items_ots oio,
                                        ots o,
                                        fabricas f,
                                        articulos a,
                                        productos p
                                    WHERE
                                        oio.idoc_item = '$idoc_item' AND
                                        oio.idot = o.idot AND
                                        o.idfabrica = f.idfabrica AND
                                        o.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto
                                    ORDER BY
                                        o.idot DESC");
        
        return $query->result_array();
    }
    
    /*
     *  ocs/asociar_ot
     */
    public function get_asociar_ot_where($datos) {
        $query = $this->db->get_where('ocs_items_ots', $datos);
        
        return $query->row_array();
    }
    
    /*
     * 
     *  ocs/desasociar_ot
     * 
     */
    public function desasociar_ot($datos) {
        $this->db->delete('ocs_items_ots', $datos);
    }
    
    
    public function gets_ocs_por_fechas_y_proveedor($desde, $hasta, $idproveedor) {
        $query = $this->db->query("SELECT sum(oi.cantidad) as cantidad_pedida, sum(ii.cantidad) as cantidad_recepcionada, oi.fecha as fecha_prometida, max(ii.timestamp) as fecha_recepcionado, oi.idoc_item
                                    FROM
                                        ((ocs_items oi
                                    INNER JOIN
                                        ocs o 
                                    ON
                                        o.idoc = oi.idoc) 
                                    LEFT JOIN
                                        irm_items ii 
                                    ON
                                        oi.idoc_item = ii.idoc_item)
                                    WHERE
                                        o.idproveedor = '$idproveedor' AND
                                        o.timestamp BETWEEN '$desde' AND '$hasta'
                                    GROUP BY
                                        oi.idoc_item    ");
        
        return $query->result_array();
    }
    
    
    public function gets_ocs_por_fechas_y_moneda($desde, $hasta, $idmoneda) {
        $query = $this->db->query("SELECT sum(oi.cantidad*oi.precio) as valor, m.moneda, p.proveedor
                                    FROM 
                                        ocs o,
                                        ocs_items oi,
                                        monedas m,
                                        proveedores p
                                    WHERE
                                        o.idoc = oi.idoc AND
                                        o.idmoneda = m.idmoneda AND
                                        o.idproveedor = p.idproveedor AND
                                        m.idmoneda = '$idmoneda' AND
                                        o.timestamp BETWEEN '$desde' AND '$hasta' AND
                                        oi.activo = '1'
                                    GROUP BY
                                        p.proveedor, m.moneda");
        
        return $query->result_array();
    }
    
    public function gets_totales_por_mes($anio, $moneda) {
        $query = $this->db->query("SELECT m.idmoneda, m.moneda, SUM(oi.cantidad * oi.precio) as subtotal, MONTH(o.timestamp) as mes, YEAR(o.timestamp) as anio
                                    FROM	
                                        ocs o,
                                        ocs_items oi,
                                        monedas m
                                    WHERE
                                        o.idoc = oi.idoc AND
                                        o.idmoneda = m.idmoneda AND
                                        YEAR(o.timestamp) = '$anio' AND
                                        m.idmoneda = '$moneda'
                                    GROUP BY
                                        m.moneda, MONTH(o.timestamp)
                                    ORDER BY
                                        MONTH(o.timestamp) ASC;");
        return $query->result_array();
    }
}
?>