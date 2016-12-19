<?php

class irm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'irm_model',
            'proveedores_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Informes de Recepción de Materiales';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('irm/index');
        $this->load->view('layout/footer');
        
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Informe de Recepción de Materiales';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idproveedor' => $this->input->post('proveedor'),
                'idusuario' => $session['SID']
            );
            
            $idirm = $this->irm_model->set($datos);
            
            redirect('/irm/agregar_items/'.$idirm.'/', 'refresh');
        }
        
        $data['proveedores'] = $this->proveedores_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('irm/agregar');
        $this->load->view('layout/footer');
    }
    
    public function pendientes() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Materiales Pendientes de Recepción';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['pendientes'] = $this->irm_model->gets_pendientes_de_recepcion();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('irm/pendientes');
        $this->load->view('layout/footer');
    }
}
?>