<?php

class Ots_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * ots/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('ots', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * ots/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots o,
                                        fabricas f,
                                        articulos a,
                                        productos p
                                    WHERE
                                        o.idfabrica = f.idfabrica AND
                                        a.idarticulo = o.idarticulo AND
                                        a.idproducto = p.idproducto AND
                                        o.activo = '1'
                                    ORDER BY
                                        o.numero_ot DESC");
        return $query->result_array();
    }
    
    /*
     * 
     * dashboard/index
     * 
     */
    public function gets_cumplidas() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots
                                    WHERE
                                        activo = '1' AND
                                        fecha_terminado <> 'NULL'
                                    ORDER BY
                                        numero_ot DESC");
        return $query->result_array();
    }
    
    /*
     * 
     * ots/ajax_fabricas
     * 
     */
    public function get_ultima_ot($idfabrica) {
        $query = $this->db->query("SELECT max(numero_ot) as ultima_ot
                                    FROM
                                        ots
                                    WHERE
                                        idfabrica = '$idfabrica'");
        return $query->row_array();
    }
    
    /*
     * 
     * ots/agregar
     * ots/modificar
     * ots/pdf
     * 
     */
    public function get_where($where) {
        $query = $this->db->get_where('ots', $where);
        
        return $query->row_array();
    }
    
    /*
     * 
     * dashboard/index
     * 
     */
    public function gets_where($where) {
        $query = $this->db->get_where('ots', $where);
        
        return $query->result_array();
    }
    
    /*
     * 
     * ots/modificar
     * 
     */
    public function update($datos, $id) {
        $array = array('idot' => $id);
        $this->db->update('ots', $datos, $array);
    }
    
    /*
     * 
     * dashboard/index
     * 
     */
    public function gets_vencidas() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots o,
                                        fabricas f
                                    WHERE 
                                        o.idfabrica = f.idfabrica AND
                                        o.fecha_necesidad <= CURDATE() AND
                                        o.fecha_terminado IS NULL");
        return $query->result_array();
    }
    
    public function gets_pendientes() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        ots o,
                                        fabricas f
                                    WHERE 
                                        o.idfabrica = f.idfabrica AND
                                        o.fecha_terminado IS NULL");
        return $query->result_array();
    }
}
?>