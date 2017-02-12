<?php

class Provincias extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session',
            'r_session',
            'uri'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'provincias_model',
            'log_model'
        ));
    }
    
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Provincias';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['provincias'] = $this->provincias_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('provincias/index');
        $this->load->view('layout_lte/footer');   
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Provincia';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['alerta'] = '';  // Se utiliza si existe la provincia repetida
        
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'provincia' => $this->input->post('provincia')
            );
            $resultado = $this->provincias_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'provincia' => $this->input->post('provincia')
                );

               $id = $this->provincias_model->set($datos); 
               
               $log = array(
                   'tabla' => 'provincias',
                   'idtabla' => $id,
                   'texto' => 'Se agregó la provincia '.$this->input->post('provincia'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);

               redirect('/provincias/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">La provincia ya existe</div>';
            }
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('provincias/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idprovincia = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idprovincia == null) {
            redirect('/provincias/', 'refresh');
        }
        $data['title'] = 'Modificar Provincia';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'provincia' => $this->input->post('provincia')
            );
            $this->provincias_model->update($datos, $idprovincia);
            
            $log = array(
                'tabla' => 'provincias',
                'idtabla' => $idprovincia,
                'texto' => "Se modificó: <br>"
                . "provincia: ".$this->input->post('provincia'),
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
            
            redirect('/provincias/', 'refresh');
        }
        
        $datos = array(
            'idprovincia' => $idprovincia
        );
        $data['provincia'] = $this->provincias_model->get_where($datos);
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('provincias/modificar');
        $this->load->view('layout_lte/footer');
    }
}

?>