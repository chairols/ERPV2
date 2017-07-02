<?php

class Numeros_serie_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  ots/agregar
     *  ots/modificar
     */
    public function gets_por_ot($idot) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        numeros_serie
                                    WHERE
                                        idot = '$idot'");
        return $query->result_array();
    }
    
    /*
     *  ots/agregar
     *  ots/modificar
     * 
     */
    public function borrar_por_ot($idot) {
        $query = $this->db->query("DELETE 
                                    FROM
                                        numeros_serie
                                    WHERE
                                        idot = '$idot'");
    }
    
    /*
     *  ots/agregar
     *  ots/modificar
     * 
     */
    public function set($datos) {
        $this->db->insert('numeros_serie', $datos);
    }
    
    
    /*
     *  numeroserie/index
     */
    public function gets() {
        $query = $this->db->query("SELECT ns.numero_serie, f.fabrica, o.idot, o.numero_ot, p.producto, a.articulo
                                    FROM
                                        numeros_serie ns,
                                        ots o,
                                        fabricas f,
                                        articulos a,
                                        productos p
                                    WHERE
                                        ns.idot = o.idot AND
                                        o.idfabrica = f.idfabrica AND
                                        o.idarticulo = a.idarticulo AND
                                        a.idproducto = p.idproducto");
        
        return $query->result_array();
    }
    
    /*
     *  numeroserie/trazabilidad
     */
    public function get_where($where) {
        $query = $this->db->get_where('numeros_serie', $where);
        
        return $query->row_array();
    }
    
    
    public function get_ultimo_numero_de_serie() {
        $query = $this->db->query("SELECT MAX(numero_serie) as ultimo
                                    FROM
                                        numeros_serie");
        return $query->row_array();
    }
}
?>