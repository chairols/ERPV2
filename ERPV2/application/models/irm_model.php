<?php

class Irm_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  ocs/agregar_item
     */
    public function set_pendienteirm($datos) {
        $this->db->insert('pendientesirm', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  ocs/borrar_item
     */
    public function update_itempendienteirm($datos, $id) {
        $array = array('idoc_item' => $id);
        $this->db->update('pendientesirm', $datos, $array);
    }
}
?>