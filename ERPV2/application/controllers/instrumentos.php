<?php

class Instrumentos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'marcas_model',
            'instrumentos_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Instrumentos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['instrumentos'] = $this->instrumentos_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('instrumentos/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Instrumento';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('instrumento', 'Instrumento', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required|integer');
        $this->form_validation->set_rules('modelo', 'Modelo', 'required');
        $this->form_validation->set_rules('frecuencia', 'Frecuencia de Calibrado', 'required|integer');
        $this->form_validation->set_rules('rango', 'Rango de Aceptación', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'instrumento' => $this->input->post('instrumento'),
                'idmarca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'rango' => $this->input->post('rango'),
                'frecuencia' => $this->input->post('frecuencia'),
                'ubicacion' => $this->input->post('ubicacion'),
                'numero_serie' => $this->input->post('numero_serie'),
                'rango_aceptacion' => $this->input->post('rango')
            );
            if($this->input->post('patron') == 'on') {
                $datos['patron'] = 1;
            }
            
            $id = $this->instrumentos_model->set($datos);
            
            
            /*
             *  datos para el log
             */
            $datos = array(
                'idmarca' => $this->input->post('marca')
            );
            $marca = $this->marcas_model->get_where($datos);
            
            $log = array(
                'tabla' => 'instrumentos',
                'idtabla' => $id,
                'texto' => 'Se agregó el instrumento '.$this->input->post('instrumento').'<br>'
                . 'marca: '.$marca['marca'].'<br>'
                . 'modelo: '.$this->input->post('modelo').'<br>'
                . 'rango: '.$this->input->post('rango').'<br>'
                . 'frecuencia de calibración en días: '.$this->input->post('frecuencia').'<br>'
                . 'ubicación: '.$this->input->post('ubicacion').'<br>'
                . 'número de serie: '.$this->input->post('numero_serie').'<br>'
                . 'rango de aceptación: '.$this->input->post('rango'),
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);

            redirect('/instrumentos/', 'refresh');
        }
        
        $data['marcas'] = $this->marcas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('instrumentos/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idinstrumento = null) {
        $session = $this->session->all_userdata();
        if($idinstrumento == null) {
            redirect('/instrumentos/', 'refresh');
        }
        $data['title'] = 'Modificar Instrumento';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $datos = array(
            'idinstrumento' => $idinstrumento
        );
        $data['instrumento'] = $this->instrumentos_model->get_where($datos);
        
        $data['marcas'] = $this->marcas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('instrumentos/modificar');
        $this->load->view('layout_lte/footer');
    }
}
?>