<?php

class Monedas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'uri'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'monedas_model',
            'log_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['monedas'] = $this->monedas_model->gets();
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('monedas/index');
        $this->load->view('layout/footer_datatable');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';  // Se utiliza si existe el insumo repetido
        
        $this->form_validation->set_rules('moneda', 'Moneda', 'required');
        $this->form_validation->set_rules('simbolo', 'Símbolo', 'required');
        $this->form_validation->set_rules('currency', 'Currency', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'moneda' => $this->input->post('moneda')
            );
            $resultado = $this->monedas_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'moneda' => $this->input->post('moneda'),
                    'simbolo' => $this->input->post('simbolo'),
                    'currency' => $this->input->post('currency')
                );

               $id = $this->monedas_model->set($datos); 

               $log = array(
                   'tabla' => 'monedas',
                   'idtabla' => $id,
                   'texto' => 'Se agregó la moneda '.$this->input->post('moneda').'<br>'
                   . 'simbolo: '.$this->input->post('simbolo').'<br>'
                   . 'currency: '.$this->input->post('currency'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               redirect('/monedas/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">La moneda ya existe</div>';
            }
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('monedas/agregar');
        $this->load->view('layout/footer_form');
    }
}
?>