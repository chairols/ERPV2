<?php

class Fabricas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'fabricas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Fábricas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['fabricas'] = $this->fabricas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('fabricas/index', $data);
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Fábrica';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';  // Se utiliza si existe la fábrica repetida
        
        $this->form_validation->set_rules('fabrica', 'Fábrica', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
        $this->form_validation->set_rules('localidad', 'Localidad', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'fabrica' => $this->input->post('fabrica')
            );
            $resultado = $this->fabricas_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'fabrica' => $this->input->post('fabrica'),
                    'direccion' => $this->input->post('direccion'),
                    'localidad' => $this->input->post('localidad'),
                    'telefono' => $this->input->post('telefono')
                );

               $this->fabricas_model->set($datos); 

               redirect('/fabricas/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">La fábrica ya existe</div>';
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('fabricas/agregar');
        $this->load->view('layout/footer');
    }
    
    public function modificar($idfabrica = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idfabrica == null) {
            redirect('/fabricas/', 'refresh');
        }
        $data['title'] = 'Modificar Fábrica';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
    }
}
?>