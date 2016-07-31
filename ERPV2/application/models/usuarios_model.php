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
                                        usuarios
                                    WHERE
                                        idusuario = '$idusuario'");
        return $query->row_array();
    }
    
    /*
     * usuarios/perfil
     */
    public function update($datos, $idusuario) {
        $id = array('idusuario' => $idusuario);
        $this->db->update('usuarios', $datos, $id);
    }
}
?>
