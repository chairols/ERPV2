<?php

class Articulos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * articulos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('articulos', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * articulos/index
     * 
     * ots/agregar
     * ots/modificar
     * 
     * pedidos/agregar_items
     * 
     * rfqs/agregar
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        (articulos a
                                    LEFT JOIN
                                        planos pl
                                    ON  
                                        a.idplano = pl.idplano)
                                    INNER JOIN
                                        productos p
                                    ON
                                        a.idproducto = p.idproducto AND
                                        a.activo = '1'
                                    LEFT JOIN
                                        medidas m
                                    ON
                                        a.unidad_medida = m.idmedida
                                    ORDER BY
                                        a.articulo");
        return $query->result_array();
    }
    
    /*
     * 
     *  articulos/borrados
     */
    public function gets_inactivos() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        (articulos a
                                    LEFT JOIN
                                        planos pl
                                    ON  
                                        a.idplano = pl.idplano)
                                    INNER JOIN
                                        productos p
                                    ON
                                        a.idproducto = p.idproducto AND
                                        a.activo = '0'
                                    ORDER BY
                                        a.articulo");
        return $query->result_array();
    }
    
    /*
     * 
     * articulos/agregar
     * articulos/modificar
     * articulos/ver
     * 
     * ots/pdf
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('articulos', $where);
        
        return $query->row_array();
    }
    
    /*
     *  
     *  articulos/borrar
     *  articulos/modificar
     * 
     */
    public function update($datos, $idarticulo) {
        $id = array('idarticulo' => $idarticulo);
        $this->db->update('articulos', $datos, $id);
    }
    
    
    /*
     * stock/con_stock
     * 
     */
    public function gets_con_stock() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        (articulos a
                                    LEFT JOIN
                                        planos pl
                                    ON  
                                        a.idplano = pl.idplano)
                                    INNER JOIN
                                        productos p
                                    ON
                                        a.idproducto = p.idproducto AND
                                        a.activo = '1' AND
                                        a.cantidad > 0
                                    LEFT JOIN
                                        medidas m
                                    ON
                                        a.unidad_medida = m.idmedida
                                    ORDER BY
                                        a.articulo");
        return $query->result_array();
    }
}
?>