<?php

class Padron extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'padron_model'
        ));
    }
    
    public function q() {
        if($this->input->get('cuit') != null) {
            //var_dump($this->input->get('cuit'));
            
            $res = $this->padron_model->get_where($this->input->get('cuit'));
            echo json_encode($res);
        } else {
            $res = array(
                'error' => 'No hay variable de inicialización'
            );
            echo json_encode($res);
        }
    }
}
?>