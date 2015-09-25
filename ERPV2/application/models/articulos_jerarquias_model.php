<?php

class Articulos_jerarquias_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  articulos/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('articulos_jerarquia', $datos);
    }
    
    /*
     *  articulos/modificar
     */
    public function borrar_jerarquias($id) {
        $this->db->delete('articulos_jerarquia', array('idarticulo_padre' => $id));
        $this->db->delete('articulos_jerarquia', array('idarticulo_hijo' => $id));
    }
    
    /*
     * articulos/modificar
     */
    public function gets_combo_padre($id) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ((articulos a
                                    LEFT JOIN
                                        planos pl
                                    ON  
                                        a.idplano = pl.idplano)
                                    INNER JOIN
                                        productos p
                                    ON
                                        a.idproducto = p.idproducto AND
                                        a.activo = '1')
                                    LEFT JOIN
                                        articulos_jerarquia aj
                                    ON
                                        a.idarticulo = aj.idarticulo_padre AND
                                        aj.idarticulo_hijo = '$id'
                                    ORDER BY
                                        a.articulo");
        return $query->result_array();
    }
    
    /*
     * articulos/modificar
     */
    public function gets_combo_hijo($id) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ((articulos a
                                    LEFT JOIN
                                        planos pl
                                    ON  
                                        a.idplano = pl.idplano)
                                    INNER JOIN
                                        productos p
                                    ON
                                        a.idproducto = p.idproducto AND
                                        a.activo = '1')
                                    LEFT JOIN
                                        articulos_jerarquia aj
                                    ON
                                        a.idarticulo = aj.idarticulo_hijo AND
                                        aj.idarticulo_padre = '$id'
                                    ORDER BY
                                        a.articulo");
        return $query->result_array();
    }
}
?>