<?php

class Hojasdeproceso_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_ultimo_id() {
        $query = $this->db->query("SELECT MAX(idhojadeproceso) as id
                                    FROM
                                        hojasdeproceso");
        return $query->row_array();
    }
    
    public function set($datos) {
        $this->db->insert('hojasdeproceso', $datos);
        return $this->db->insert_id();
    }
    
    public function asociar_articulo($datos) {
        $this->db->insert('hojasdeproceso_articulos', $datos);
        return $this->db->insert_id();
    }
    
    public function get_where_asociar_articulo($where) {
        $query = $this->db->get_where('hojasdeproceso_articulos', $where);
        
        return $query->row_array();
    }
    
    public function gets_articulos_asociados($idhojadeproceso) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        (((hojasdeproceso_articulos ha
                                    INNER JOIN
                                        articulos a
                                    ON
                                        ha.idarticulo = a.idarticulo AND
                                        ha.idhojadeproceso = '$idhojadeproceso')
                                    INNER JOIN
                                        productos pr
                                    ON
                                        pr.idproducto = a.idproducto)
                                    LEFT JOIN
                                        planos p
                                    ON
                                        a.idplano = p.idplano)");
        return $query->result_array();
            
    }
    
    public function gets() {
        
    }
    
    public function borrar_articulo($datos) {
        $this->db->delete('hojasdeproceso_articulos', $datos);
    }
}
?>