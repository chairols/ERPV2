<?php

class Contratos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'clientes_model',
            'contratos_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }

    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Contratos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['contratos'] = $this->contratos_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('contratos/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Contrato';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        $this->form_validation->set_rules('numero_contrato', 'Número de Contrato', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            /*$datos = array(
                'idcliente' => $this->input->post('cliente'),
                'numero_contrato' => $this->input->post('numero_contrato')
            );
            $resultado = $this->contratos_model->get_where($datos);
            
            if(count($resultado) == 0) { */  // Se anula porque se necesita poder duplicar contratos
                $datos = array(
                    'idcliente' => $this->input->post('cliente'),
                    'numero_contrato' => $this->input->post('numero_contrato'),
                    'descripcion' => $this->input->post('descripcion')
                );
                if($this->input->post('vigencia_desde') == '') {
                    $datos['vigencia_desde'] = NULL;
                } else {
                    $datos['vigencia_desde'] = $this->input->post('vigencia_desde');
                }
                if($this->input->post('vigencia_hasta') == '') {
                    $datos['vigencia_hasta'] = NULL;
                } else {
                    $datos['vigencia_hasta'] = $this->input->post('vigencia_hasta');
                }
                
                $config['upload_path'] = "./upload/contratos/";
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;
                $config['remove_spaces'] = true;

                $this->load->library('upload', $config);
                $adjunto = null;

                if(!$this->upload->do_upload('adjunto')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $adjunto = array('upload_data' => $this->upload->data());
                }

                if($adjunto != null) {
                    $datos['adjunto'] = '/upload/contratos/'.$adjunto['upload_data']['file_name'];
                } 

                $idcontrato = $this->contratos_model->set($datos);
                $cliente = $this->clientes_model->get_where(array('idcliente' => $this->input->post('cliente')));
                
                $log = array(
                    'tabla' => 'contratos',
                    'idtabla' => $idcontrato,
                    'texto' => 'Se agregó: <br>'
                     . 'cliente: '.$cliente['cliente'].'<br>'
                     . 'contrato: '.$this->input->post('numero_contrato').'<br>'
                     . 'descripción: '.$this->input->post('descripcion').'<br>'
                     . 'vigencia desde: '.$this->input->post('vigencia_desde').'<br>'
                     . 'vigencia hasta: '.$this->input->post('vigencia_hasta').'<br>'
                     . 'adjunto: /upload/contratos/'.$adjunto['upload_data']['file_name'],
                    'tipo' => 'add',
                    'idusuario' => $session['SID']
                );

                $this->log_model->set($log);
                
                redirect('/contratos/', 'refresh');
            /* } */
        }
        
        $data['clientes'] = $this->clientes_model->gets();
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('contratos/agregar');
        $this->load->view('layout/footer_form');
    }
}
?>