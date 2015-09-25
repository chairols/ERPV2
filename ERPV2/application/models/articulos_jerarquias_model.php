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
    
    public function borrar_jerarquias($id) {
        $this->db->delete('articulos_jerarquia', array('idarticulo_padre' => $id));
        $this->db->delete('articulos_jerarquia', array('idarticulo_hijo' => $id));
    }
}
?>