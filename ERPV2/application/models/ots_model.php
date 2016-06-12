<?php

class Ots_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * ots/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('ots', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * ocs/asociar_ot
     * 
     * ots/index
     * 
     * pedidos/asociar_ot
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT o.*, f.fabrica, p.producto, a.articulo
                                    FROM
                                        ots o,
                                        fabricas f,
                                        articulos a,
                                        productos p
                                    WHERE
                                        o.idfabrica = f.idfabrica AND
                                        a.idarticulo = o.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        o.activo = '1'
                                    ORDER BY
                                        o.numero_ot DESC");
        return $query->result_array();
    }
    
    /*
     * 
     * dashboard/index
     * 
     */
    public function gets_cumplidas() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots
                                    WHERE
                                        activo = '1' AND
                                        fecha_terminado <> 'NULL'
                                    ORDER BY
                                        numero_ot DESC");
        return $query->result_array();
    }
    
    /*
     * 
     * ots/ajax_fabricas
     * 
     */
    public function get_ultima_ot($idfabrica) {
        $query = $this->db->query("SELECT max(numero_ot) as ultima_ot
                                    FROM
                                        ots
                                    WHERE
                                        idfabrica = '$idfabrica'");
        return $query->row_array();
    }
    
    /*
     * 
     * ots/agregar
     * ots/modificar
     * ots/pdf
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('ots', $where);
        
        return $query->row_array();
    }
    
    /*
     * 
     * dashboard/index
     * 
     */
    public function gets_where($where) {
        $query = $this->db->get_where('ots', $where);
        
        return $query->result_array();
    }
    
    /*
     * 
     * ots/modificar
     * ots/borrar
     * 
     */
    public function update($datos, $id) {
        $array = array('idot' => $id);
        $this->db->update('ots', $datos, $array);
    }
    
    /*
     * 
     * dashboard/index
     * 
     */
    public function gets_vencidas() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots o,
                                        fabricas f
                                    WHERE 
                                        o.idfabrica = f.idfabrica AND
                                        o.fecha_necesidad <= CURDATE() AND
                                        o.fecha_terminado IS NULL");
        return $query->result_array();
    }
    
    public function gets_pendientes() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots o,
                                        fabricas f
                                    WHERE 
                                        o.idfabrica = f.idfabrica AND
                                        o.fecha_terminado IS NULL AND
                                        o.activo = '1'");
        return $query->result_array();
    }
    
    /*
     *  ots/borradas
     */
    public function gets_borradas() {
        $query = $this->db->query("SELECT o.*, f.fabrica, p.producto, a.articulo
                                    FROM
                                        ots o,
                                        fabricas f,
                                        articulos a,
                                        productos p
                                    WHERE
                                        o.idfabrica = f.idfabrica AND
                                        a.idarticulo = o.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        o.activo = '0'
                                    ORDER BY
                                        o.numero_ot DESC");
        return $query->result_array();
    }
    
    /*
     * 
     * 
     * 
     */
    public function gets_ots_sin_pedidos_por_articulo($idarticulo) {
       $query = $this->db->query("SELECT o.*, f.fabrica 
                                    FROM 
                                        (ots o inner join fabricas f on o.idarticulo = '$idarticulo' AND o.idfabrica = f.idfabrica)
                                        left join pedidos_items pi on o.idot = pi.idot");
       
       return $query->result_array();
    }
    
    /*
     *  ots/trazabilidad
     */
    public function gets_pedidos_asociados($idot) {
        $query = $this->db->query("SELECT pi.cantidad, pr.producto, a.articulo, m.simbolo, pi.precio, p.ordendecompra, p.adjunto, c.cliente
                                    FROM
                                        pedidos_items_ots pio,
                                        pedidos_items pi,
                                        pedidos p,
                                        articulos a,
                                        productos pr,
                                        monedas m,
                                        clientes c
                                    WHERE
                                        pio.idot = $idot AND
                                        pio.idpedido_item = pi.idpedido_item AND
                                        p.idpedido = pi.idpedido AND
                                        pi.idarticulo = a.idarticulo AND
                                        a.idproducto = pr.idproducto AND
                                        p.idmoneda = m.idmoneda AND
                                        p.idcliente = c.idcliente");
        return $query->result_array();
    }
    

    public function gets_ocs_asociadas($idot) {
        $query = $this->db->query("SELECT oi.cantidad, p.producto, a.articulo, m.simbolo, oi.precio, o.idoc, pr.proveedor
                                    FROM
                                        ocs_items_ots oio,
                                        ocs_items oi,
                                        articulos a,
                                        productos p,
                                        monedas m,
                                        ocs o,
                                        proveedores pr
                                    WHERE
                                        oio.idot = $idot AND
                                        oio.idoc_item = oi.idoc_item AND
                                        oi.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        o.idoc = oi.idoc AND
                                        o.idmoneda = m.idmoneda AND
                                        o.idproveedor = pr.idproveedor");
        return $query->result_array();
    }
    
     /*
     *  ots/trazabilidad
     */
    public function gets_ocs_asociadas_por_monedas($idot, $idmoneda) {
        $query = $this->db->query("SELECT oi.cantidad, p.producto, a.articulo, m.simbolo, oi.precio, o.idoc, pr.proveedor
                                    FROM
                                        ocs_items_ots oio,
                                        ocs_items oi,
                                        articulos a,
                                        productos p,
                                        monedas m,
                                        ocs o,
                                        proveedores pr
                                    WHERE
                                        oio.idot = $idot AND
                                        oio.idoc_item = oi.idoc_item AND
                                        oi.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        o.idoc = oi.idoc AND
                                        o.idmoneda = m.idmoneda AND
                                        o.idproveedor = pr.idproveedor AND
                                        m.idmoneda = $idmoneda");
        return $query->result_array();
    }
}
?>