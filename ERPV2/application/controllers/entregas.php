<?php

class Entregas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'proveedores_model',
            'ocs_model'
        ));
           
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Entregas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
                
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required|integer');
        $this->form_validation->set_rules('desde', 'Fecha Desde', 'required');
        $this->form_validation->set_rules('hasta', 'Fecha Hasta', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $data['ocs'] = $this->ocs_model->gets_ocs_por_fechas_y_proveedor($this->input->post('desde'), $this->input->post('hasta'), $this->input->post('proveedor'));
        }
        
        $data['proveedores'] = $this->proveedores_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('entregas/index');
        $this->load->view('layout_lte/footer');
    }
}
?>