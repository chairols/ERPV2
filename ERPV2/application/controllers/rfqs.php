<?php

class Rfqs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'rfqs_model',
            'ots_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('rfqs/index');
        $this->load->view('layout/footer_datatable');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('item', 'Item', 'numeric');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array();
            if($this->input->post('item') == '') {
                $datos['item'] = null;
            } else {
                $datos['item'] = $this->input->post('item');
            }
            
            $datos['fecha'] = $this->input->post('fecha');
            
            if($this->input->post('ot') == 'null') {
                $datos['idot'] = null;
            } else {
                $datos['idot'] = $this->input->post('ot');
            }
            
            $id = $this->rfqs_model->set($datos);
            
            redirect('/rfqs/agregar_items/'.$id, 'refresh');
        }
        
        $data['ots'] = $this->ots_model->gets();
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('rfqs/agregar');
        $this->load->view('layout/footer_form');
    }
    
    public function agregar_items($idrfq = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        if($idrfq == null) {
            redirect('/rfqs/', 'refresh');
        }
        
        $data['rfq'] = $this->rfqs_model->get_where(array('idrfq' => $idrfq));
        $data['ot'] = $this->ots_model->get_where(array('idot' => $data['rfq']['idot']));
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('rfqs/agregar_items');
        $this->load->view('layout/footer_datatable');
    }
}

?>