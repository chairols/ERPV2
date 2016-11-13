<?php

class Materiales extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'materiales_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Materiales';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['materiales'] = $this->materiales_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('materiales/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Material';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe el material repetido
        
        $this->form_validation->set_rules('material', 'Material', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'material' => $this->input->post('material')
            );
            $resultado = $this->materiales_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'material' => $this->input->post('material')
                );

               $this->materiales_model->set($datos); 

               redirect('/materiales/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El material ya existe</div>';
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('materiales/agregar');
        $this->load->view('layout/footer');
    }
}
?>