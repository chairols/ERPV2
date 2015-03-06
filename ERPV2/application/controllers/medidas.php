<?php

class Medidas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'medidas_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Unidades de Medida';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['medidas'] = $this->medidas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('medidas/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('medidas/agregar');
        $this->load->view('layout/footer_datatable');
    }
}
?>