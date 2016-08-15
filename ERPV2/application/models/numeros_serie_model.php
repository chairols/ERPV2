<?php

class Numeros_serie_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
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
    
    public function set($datos) {
        $this->db->insert('numeros_serie', $datos);
    }
}
?>