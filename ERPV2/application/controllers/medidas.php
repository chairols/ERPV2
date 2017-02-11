<?php

class Medidas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'medidas_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Unidades de Medida';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['medidas'] = $this->medidas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('medidas/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Unidad de Medida';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('medida_corta', 'Descripción Corta', 'required');
        $this->form_validation->set_rules('medida_larga', 'Descripción Larga', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'medida_corta' => $this->input->post('medida_corta'),
                'medida_larga' => $this->input->post('medida_larga'),
                'activo' => '1'
            );
            $id = $this->medidas_model->set($datos);
            
            $log = array(
                'tabla' => 'medidas',
                'idtabla' => $id,
                'texto' => 'Se agregó la unidad de medida<br>'
                . 'Descripción corta: '.$this->input->post('medida_corta').'<br>'
                . 'Descripción larga: '.$this->input->post('medida_larga'),
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
               
            redirect('/medidas/', 'refresh');
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('medidas/agregar');
        $this->load->view('layout/footer');
    }
}
?>