<?php

class Controles extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'controles_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Controles';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['controles'] = $this->controles_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('controles/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Control';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('control', 'Control', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'control' => $this->input->post('control')
            );
            
            $this->controles_model->set($datos);
            
            redirect('/controles/', 'refresh');
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('controles/agregar');
        $this->load->view('layout/footer_form');
    }
    
    public function ajax_check_control($control = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $datos = array(
            'control' => $control
        );
        $data['resultado'] = $this->controles_model->get_where($datos);
        $data['control'] = $control;
        
        $this->load->view("controles/ajax_check_control", $data);
    }
}
?>