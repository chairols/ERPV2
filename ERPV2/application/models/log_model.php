<?php

class Log_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * articulos/agregar
     * 
     * clientes/agregar
     * 
     * insumos/agregar
     * 
     * monedas/agregar
     * 
     * ots/agregar
     * ots/modificar
     * 
     * pedidos/agregar
     * pedidos/agregar_items
     * 
     * proveedores/agregar
     * 
     * provincias/agregar
     * 
     * roles/agregar
     * 
     */
    public function set($array) {
        $this->db->insert('log', $array);
    }
    
    /*
     * 
     * log/ver
     * 
     */
    public function gets($tabla, $idtabla) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        log
                                    WHERE
                                        tabla = '$tabla' AND
                                        idtabla = '$idtabla'");
        return $query->result_array();
    }
}
?>