<?php

class Hojasdeproceso extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'hojasdeproceso_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Hojas de Proceso';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['procesos'] = $this->hojasdeproceso_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('hojasdeproceso/index', $data);
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Hoja de Proceso';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('hojadeproceso', 'Hoja de Proceso', 'required');
        $this->form_validation->set_rules('editable', 'Archivo Editable', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('hojasdeproceso/agregar', $data);
        $this->load->view('layout_lte/footer');
    }
}
?>