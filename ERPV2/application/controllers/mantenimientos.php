<?php

class Mantenimientos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'maquinas_model',
            'marcas_model',
            'usuarios_model',
            'mantenimientos_model',
            'tipos_maquinas_model',
            'log_model'
        ));
        
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Mantenimientos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['mantenimientos'] = $this->mantenimientos_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('mantenimientos/index');
        $this->load->view('mantenimientos/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Mantenimiento';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['maquinas'] = $this->maquinas_model->gets();
        $data['usuarios'] = $this->usuarios_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('mantenimientos/agregar');
        $this->load->view('mantenimientos/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar_post() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('tipo_mantenimiento', 'Tipo de Mantenimiento', 'required');
        $this->form_validation->set_rules('maquina', 'Máquina', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('diagnostico', 'Diagnóstico', 'required');
        $this->form_validation->set_rules('correccion', 'Corrección', 'required');
        $this->form_validation->set_rules('usuario', 'Responsable', 'required|is_natural');
        $this->form_validation->set_rules('tiempo_reparacion', 'Tiempo de Reparación', 'required|is_natural_no_zero');
        
        if($this->form_validation->run() == FALSE) {
            $json = array(
                'status' => 'error',
                'data' => validation_errors()
            );
            echo json_encode($json);
        } else {
            $datos = array(
                'fecha' => $this->input->post('fecha'),
                'tipo_mantenimiento' => $this->input->post('tipo_mantenimiento'),
                'idmaquina' => $this->input->post('maquina'),
                'diagnostico' => $this->input->post('diagnostico'),
                'correccion' => $this->input->post('correccion'),
                'idusuario' => $this->input->post('usuario'),
                'tiempo_reparacion' => $this->input->post('tiempo_reparacion')
            );
            
            $id = $this->mantenimientos_model->set($datos);
            
            $tipo_manteniemiento = '';
            if($this->input->post('tipo_mantenimiento') == 'C') {
                $tipo_manteniemiento = "Correctivo";
            } elseif($this->input->post('tipo_mantenimiento') == 'P') {
                $tipo_manteniemiento = "Preventivo";
            }
            
            $datos = array(
                'idmaquina' => $this->input->post('maquina')
            );
            $maquina = $this->maquinas_model->get_where($datos);
            
            $datos = array(
                'idmarca' => $maquina['idmarca']
            );
            $maquina['marca'] = $this->marcas_model->get_where($datos);
            
            $datos = array(
                'idtipo_maquina' => $maquina['idtipo_maquina']
            );
            $maquina['tipo_maquina'] = $this->tipos_maquinas_model->get_where($datos);
            
            $datos = array(
                'idusuario' => $this->input->post('usuario')
            );
            $usuario = $this->usuarios_model->get_where($datos);
            
            $log = array(
                'tabla' => 'mantenimientos',
                'idtabla' => $id,
                'texto' => 'Se agregó el mantenimiento <br> '
                . 'fecha: '.$this->input->post('fecha').'<br>'
                . 'tipo de mantenimiento: '.$tipo_manteniemiento.'<br>'
                . 'maquina: '.$maquina['tipo_maquina']['tipo_maquina'].' '.$maquina['marca']['marca'].' '.$maquina['modelo'].'<br>'
                . 'diagnostico: '.$this->input->post('diagnostico').'<br>'
                . 'correccion: '.$this->input->post('correccion').'<br>'
                . 'usuario: '.$usuario['nombre'].' '.$usuario['apellido'].'<br>'
                . 'tiempo de reparación: '.$this->input->post('tiempo_reparacion'),
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);

            if($id > 0) {
                $json = array(
                    'status' => 'ok'
                );
                echo json_encode($json);
            } else {
                $json = array(
                    'status' => 'error',
                    'data' => 'No se pudo agregar'
                );
                echo json_encode($json);
            }
            
        }
    }
}
?>