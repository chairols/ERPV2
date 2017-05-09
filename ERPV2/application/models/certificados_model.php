<?php

class Certificados_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_ultimo_numero_certificado() {
        $query = $this->db->query("SELECT MAX(numero_certificado) as numero
                                    FROM
                                        certificados");
        return $query->row_array();
    }
    
    /*
     *  certificados/agregar_post
     */
    public function set($datos) {
        $this->db->insert('certificados', $datos);
        return $this->db->insert_id();
    }
}

?>