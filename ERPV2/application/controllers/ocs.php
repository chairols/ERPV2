<?php

class Ocs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Órdenes de Trabajo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('layout/footer');
    }
}
?>