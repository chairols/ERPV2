<?php

class Maquinas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'marcas_model',
            'fabricas_model',
            'tipos_maquinas_model',
            'maquinas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Máquinas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['maquinas'] = $this->maquinas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('maquinas/index');
        $this->load->view('maquinas/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Máquina';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['tiposmaquinas'] = $this->tipos_maquinas_model->gets();
        $data['marcas'] = $this->marcas_model->gets();
        $data['fabricas'] = $this->fabricas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('maquinas/agregar');
        $this->load->view('maquinas/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar_post() {
        //$session = $this->session->all_userdata();
        //$this->r_session->check($session);
        
        $this->form_validation->set_rules('numero_maquina', 'Número de Máquina', 'required|is_natural');
        $this->form_validation->set_rules('tipo_maquina', 'Tipo de Máquina', 'required|is_natural');
        $this->form_validation->set_rules('marca', 'Marca', 'required|is_natural');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('ubicacion', 'Ubicación', 'required|is_natural');
        $this->form_validation->set_rules('frecuencia_preventivo', 'Frecuencia Preventivo', 'required|is_natural');
        
        if($this->form_validation->run() == FALSE) {
            $json = array(
                'status' => 'error',
                'data' => validation_errors()
            );
            echo json_encode($json);
        } else {
            $datos = array(
                'idmaquina' => $this->input->post('numero_maquina')
            );
            $resultado = $this->maquinas_model->get_where($datos);
            
            if(count($resultado) == 0) {
                $datos = array(
                    'idmaquina' => $this->input->post('numero_maquina'),
                    'idtipo_maquina' => $this->input->post('tipo_maquina'),
                    'idmarca' => $this->input->post('marca'),
                    'modelo' => $this->input->post('modelo'),
                    'estado' => $this->input->post('estado'),
                    'idfabrica' => $this->input->post('ubicacion'),
                    'frecuencia_preventivo' => $this->input->post('frecuencia_preventivo')
                );
                
                $id = $this->maquinas_model->set($datos);
                
                
                
                $json = array(
                    'status' => 'ok',
                    'data' => ''
                );
                echo json_encode($json);

                 
            } else {
                $json = array(
                    'status' => 'error',
                    'data' => '<p>El número de máquina '.$this->input->post('numero_maquina').' ya existe</p>'
                );
                echo json_encode($json);
            }
            
        }
    }
}
?>