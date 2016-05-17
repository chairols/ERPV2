<?php

class Stock_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * stock/agregar
     * stock/almacenes
     * stock/modificar
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('stock', $where);
        
        return $query->row_array();
    }
    
    /*
     * stock/agregar
     */
    public function set($datos) {
        $this->db->insert('stock', $datos);
        return $this->db->insert_id();
    }
    
    public function gets() {
        /*$query = $this->db->query("SELECT s.*, SUM(sa.cantidad) as cantidad, a.articulo, p.producto, a.posicion, m.medida_larga
                                    FROM 
                                        ((((stock s 
                                    LEFT JOIN 
                                        stock_almacenes sa 
                                    ON 
                                        s.idstock = sa.idstock)
                                    INNER JOIN
                                        articulos a
                                    ON
                                        s.idarticulo = a.idarticulo)
                                    INNER JOIN
                                        productos p
                                    ON
                                        a.idproducto = p.idproducto)
                                    INNER JOIN
                                        medidas m
                                    ON
                                        s.idmedida = m.idmedida)");*/
        $query = $this->db->query("SELECT SUM(sa.cantidad) as cantidad, sa.idstock, a.articulo, p.producto, a.posicion, m.medida_larga
                                    FROM 
                                        stock s,
                                        stock_almacenes sa,
                                        articulos a,
                                        productos p,
                                        medidas m
                                    WHERE
                                        s.idstock = sa.idstock AND
                                        s.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        s.idmedida = m.idmedida
                                    GROUP BY
                                        sa.idstock");
        return $query->result_array();
    }
    
    public function gets_stock_existente($idstock) {
        $query = $this->db->query("SELECT sa.*, a.almacen 
                                    FROM
                                        stock_almacenes sa,
                                        almacenes a
                                    WHERE
                                        sa.idalmacen = a.idalmacen AND
                                        idstock = '$idstock'");
        return $query->result_array();
    }
    
    public function set_stock_almacen($datos) {
        $this->db->insert('stock_almacenes', $datos);
        return $this->db->insert_id();
    }
    
    public function gets_stock_almacenes_por_stock($idstock) {
        $query = $this->db->query("SELECT sa.*, a.* 
                                    FROM
                                        stock_almacenes sa, 
                                        almacenes a
                                    WHERE
                                        a.idalmacen = sa.idalmacen AND
                                        sa.idstock = '$idstock'");
        return $query->result_array();
    }
    
    public function get_where_stock_almacenes($where) {
        $query = $this->db->get_where('stock_almacenes', $where);
        
        return $query->row_array();
    }
    
}
?>