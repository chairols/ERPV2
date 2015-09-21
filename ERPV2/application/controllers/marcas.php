<?php

class Marcas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'marcas_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Marcas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['marcas'] = $this->marcas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('marcas/index');
        $this->load->view('layout/footer');
    }
}
?>