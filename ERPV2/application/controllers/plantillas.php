<?php

class Plantillas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'plantillas_model',
            'log_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Plantillas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('plantillas/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Plantilla';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('titulo', 'Título', 'required');
        $this->form_validation->set_rules('plantilla', 'Plantilla', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'titulo' => $this->input->post('titulo'),
                'plantilla' => $this->input->post('plantilla')
            );
            
            $this->plantillas_model->set($datos);
            
            redirect('/plantillas/', 'refresh');
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('plantillas/agregar');
        $this->load->view('layout/footer');
    }
}
?>