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
    
    public function gets() {
        $query = $this->db->query("SELECT c.*, a.articulo, p.producto, cl.cliente
                                    FROM 
                                        certificados c,
                                        articulos a,
                                        productos p,
                                        clientes cl
                                    WHERE
                                        c.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        c.idcliente = cl.idcliente");
        return $query->result_array();
    }
    
    public function get_where($where) {
        $query = $this->db->get_where('certificados', $where);
        
        return $query->row_array();
    }
}

?>