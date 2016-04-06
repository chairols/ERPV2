<?php

class Reqs_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * 
     * reqs/agregar
     * 
     */
    public function set($datos) {
        $this->db->insert('reqs', $datos);
        return $this->db->insert_id();
    }
    
    /*
     * 
     * rfqs/index
     * 
     */
    public function gets() {
        $query = $this->db->query("SELECT r.*, p.producto, a.articulo, m.material, f.fabrica, o.numero_ot
                                    FROM (((((reqs r inner join articulos a on r.idarticulo = a.idarticulo)
                                    inner join materiales m on r.idmaterial = m.idmaterial)
                                    inner join fabricas f on r.idfabrica = f.idfabrica)
                                    inner join productos p on a.idproducto = p.idproducto)
                                    left join ots o on r.idot = o.idot)");
        return $query->result_array();
    }
    
    public function get_where($where) {
        $query = $this->db->get_where('reqs', $where);
        
        return $query->row_array();
    }
}
?>