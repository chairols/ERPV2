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
     * medidas/agregar
     * 
     * monedas/agregar
     * 
     * ots/agregar
     * ots/borrar
     * ots/modificar
     * 
     * pedidos/agregar
     * pedidos/agregar_items
     * 
     * planos/agregar
     * planos/borrar
     * planos/modificar
     * 
     * proveedores/agregar
     * 
     * provincias/agregar
     * 
     * roles/agregar
     * 
     * stock/modificar
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