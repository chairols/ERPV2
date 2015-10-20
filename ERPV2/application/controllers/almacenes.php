<?php

class Almacenes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'almacenes_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Almacenes';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['almacenes'] = $this->almacenes_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('almacenes/index', $data);
        $this->load->view('layout/footer');
    }
}
?>