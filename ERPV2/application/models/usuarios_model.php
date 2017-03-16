<?php

class Usuarios_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_usuario($usuario, $password) {
        $query = $this->db->query("SELECT 
                                        idusuario,
                                        usuario,
                                        nombre,
                                        apellido,
                                        correo,
                                        tipo_usuario
                                    FROM
                                        usuarios
                                    WHERE
                                        usuario = '$usuario' AND
                                        password = '$password'");
        return $query->row_array();
    }
    
    /*
     *  usuarios/perfil
     */
    public function get($idusuario) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios u,
                                        roles r
                                    WHERE
                                        u.idusuario = '$idusuario' AND
                                        u.tipo_usuario = r.idrol");
        return $query->row_array();
    }
    
    /*
     * usuarios/perfil
     */
    public function update($datos, $idusuario) {
        $id = array('idusuario' => $idusuario);
        $this->db->update('usuarios', $datos, $id);
    }
    
    /*
     *  usuarios
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        usuarios u,
                                        roles r
                                    WHERE
                                        u.tipo_usuario = r.idrol
                                    ORDER BY
                                        u.nombre, u.apellido");
        return $query->result_array();
    }
    
    /*
     *  usuarios/agregar
     *  usuarios/modificar
     */
    public function get_where($where) {
        $query = $this->db->get_where('usuarios', $where);
        
        return $query->row_array();
    }
    
    /*
     *  usuarios/agregar
     */
    public function set($datos) {
        $this->db->insert('usuarios', $datos);
        return $this->db->insert_id();
    }
}
?>
