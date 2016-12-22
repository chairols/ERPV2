<?php

class Stock_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * stock/agregar
     * stock/almacenes
     * stock/editar
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
        $query = $this->db->query("SELECT SUM(sa.cantidad) as cantidad, sa.idstock, a.articulo, p.producto, a.posicion, m.medida_larga, mar.marca
                                    FROM 
                                        stock s,
                                        stock_almacenes sa,
                                        articulos a,
                                        productos p,
                                        medidas m,
                                        marcas mar
                                    WHERE
                                        s.idstock = sa.idstock AND
                                        s.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        s.idmedida = m.idmedida AND
                                        s.idmarca = mar.idmarca
                                    GROUP BY
                                        sa.idstock");
        return $query->result_array();
    }
    
    /*
     *  stock/por_almacen
     */
    public function gets_stock_por_almacen($idalmacen) {
        $query = $this->db->query("SELECT SUM(sa.cantidad) as cantidad, al.almacen, sa.idstock, sa.ubicacion, a.articulo, p.producto, a.posicion, m.medida_larga, mar.marca
                                    FROM 
                                        stock s,
                                        stock_almacenes sa,
                                        almacenes al,
                                        articulos a,
                                        productos p,
                                        medidas m,
                                        marcas mar
                                    WHERE
                                        s.idstock = sa.idstock AND
                                        sa.idalmacen = al.idalmacen AND
                                        s.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        s.idmedida = m.idmedida AND
                                        s.idmarca = mar.idmarca AND
                                        al.idalmacen = '$idalmacen'
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
    
    /*
     * stock/editar x 2
     */
    public function get_where_stock_almacenes($where) {
        $query = $this->db->get_where('stock_almacenes', $where);
        
        return $query->row_array();
    }
    
    /*
     * stock/editar
     */
    public function update_stock_almacen($datos, $idstock_almacen) {
        $id = array('idstock_almacen' => $idstock_almacen);
        $this->db->update('stock_almacenes', $datos, $id);
    }
}
?>