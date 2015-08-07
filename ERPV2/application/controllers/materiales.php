<?php

class Materiales extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'materiales_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Materiales';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['materiales'] = $this->materiales_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('materiales/index');
        $this->load->view('layout/footer');
    }
}
?>