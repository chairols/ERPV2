<?php

class Menu_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  menu/agregar
     */
    public function set($datos) {
        $this->db->insert('menu', $datos);
        return $this->db->insert_id();
    }
    
    public function obtener_menu_por_padre($idpadre) {
        $query = $this->db->query("SELECT * 
                                    FROM
                                        menu
                                    WHERE
                                        padre = '$idpadre' AND
                                        visible = '1'
                                    ORDER BY
                                        orden" );
        return $query->result_array();
    }
    
    /*
     *  menu/agregar
     * 
     */
    public function gets_where($where) {
        $query = $this->db->get_where('menu', $where);
        
        return $query->result_array();
    }
    
    /*
     *  menu/index
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('menu', $where);
        
        return $query->row_array();
    }
    
    /*
     *  menu/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                    FROM
                        menu");
        return $query->result_array();
                    
    }
}
?>