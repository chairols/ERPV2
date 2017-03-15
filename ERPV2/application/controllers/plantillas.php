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
        
        $data['plantillas'] = $this->plantillas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('plantillas/index');
        $this->load->view('plantillas/script');
        $this->load->view('layout_lte/footer');
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
            
            $id = $this->plantillas_model->set($datos);
            
            $log = array(
                'tabla' => 'plantillas',
                'idtabla' => $id,
                'texto' => 'Se agregó la plantilla<br>'
                . 'Título: '.$this->input->post('titulo').'<br>'
                . 'Plantilla: '.$this->input->post('plantilla'),
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
            
            redirect('/plantillas/', 'refresh');
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('plantillas/agregar');
        $this->load->view('plantillas/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idplantilla = NULL) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idplantilla == NULL) {
            redirect('/plantillas/', 'refresh');
        }
        $data['title'] = 'Modificar Plantilla';
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
            
            $this->plantillas_model->update($datos, $idplantilla);
            
            $log = array(
                'tabla' => 'plantillas',
                'idtabla' => $idplantilla,
                'texto' => 'Se modificó la plantilla<br>'
                . 'Título: '.$this->input->post('titulo').'<br>'
                . 'Plantilla: '.$this->input->post('plantilla'),
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
            
            redirect('/plantillas/', 'refresh');
        }
        
        $datos = array(
            'idplantilla' => $idplantilla
        );
        $data['plantilla'] = $this->plantillas_model->get_where($datos);
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('plantillas/modificar');
        $this->load->view('plantillas/script');
        $this->load->view('layout_lte/footer');
    }
    
}
?>