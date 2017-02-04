<?php

class Log_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * almacenes/agregar
     * almacenes/modificar
     * 
     * articulos/agregar
     * articulos/modificar
     * articulos/borrar
     * 
     * clientes/agregar
     * clientes/modificar
     * 
     * contratos/agregar
     * 
     * fabricas/agregar
     * fabricas/modificar
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
     * retenciones/agregar
     * 
     * rfqs/agregar
     * 
     * roles/agregar
     * 
     * stock/almacenes
     * stock/editar
     * stock/modificar
     * 
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
                                        idtabla = '$idtabla'
                                    ORDER BY
                                        fecha DESC");
        return $query->result_array();
    }
}
?>