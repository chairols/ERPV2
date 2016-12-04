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
    
    /*
     *  roles/menu
     */
    public function obtener_menu_por_padre($idpadre, $idrol) {
        $query = $this->db->query("SELECT m.*, rm.idrol 
                                    FROM
                                        (menu m
                                    LEFT JOIN
                                        roles_menu rm
                                    ON
                                        m.idmenu = rm.idmenu AND
                                        rm.idrol = '$idrol')
                                    WHERE
                                        m.padre = '$idpadre'
                                    ORDER BY
                                        m.orden, m.menu" );
        return $query->result_array();
    }
    
    
    public function obtener_menu_por_padre_para_menu($idpadre) {
        $query = $this->db->query("SELECT m.*, rm.idrol 
                                    FROM
                                        menu m
                                    LEFT JOIN
                                        roles_menu rm
                                    ON
                                        m.idmenu = rm.idmenu 
                                    WHERE
                                        m.padre = '$idpadre'
                                    ORDER BY
                                        m.orden, m.menu" );
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
    
    /*
     *  roles/desasociar
     */
    public function desasociar_rol($datos) {
        $this->db->delete('roles_menu', $datos);
    }
    
    /*
     *  roles/asociar
     */
    public function asociar_rol($datos) {
        $this->db->insert('roles_menu', $datos);
    }
    
    
    /*
     *  Libraries/r_session/comprobar_accesos
     */
    public function get_rol_menu($idrol, $menu) {
        $query = $this->db->query("SELECT * 
                                    FROM
                                        menu m,
                                        roles_menu rm
                                    WHERE
                                        m.href = '$menu' AND
                                        rm.idrol = '$idrol' AND
                                        m.idmenu = rm.idmenu");
        
        return $query->result_array();
    }
    
    /*
     *  menu/modificar
     */
    public function update($datos, $id) {
        $array = array('idmenu' => $id);
        $this->db->update('menu', $datos, $array);
    }
}
?>