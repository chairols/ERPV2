<?php

class Proveedores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'proveedores_model',
            'provincias_model',
            'log_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Proveedores';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['proveedores'] = $this->proveedores_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('proveedores/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Proveedor';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['alerta'] = '';  // Se utiliza si existe el proveedor repetida
        $data['provincias'] = $this->provincias_model->gets();
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'proveedor' => $this->input->post('proveedor')
            );
            $resultado = $this->proveedores_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'proveedor' => $this->input->post('proveedor'),
                    'domicilio' => $this->input->post('domicilio'),
                    'telefono' => $this->input->post('telefono'),
                    'localidad' => $this->input->post('localidad'),
                    'idprovincia' => $this->input->post('provincia'),
                    'contacto' => $this->input->post('contacto'),
                    'observaciones' => $this->input->post('observaciones')
                );

               $id = $this->proveedores_model->set($datos); 
               
               $provincia = $this->provincias_model->get_where(array('idprovincia' => $this->input->post('provincia')));
               
               $log = array(
                   'tabla' => 'proveedores',
                   'idtabla' => $id,
                   'texto' => 'Se agregó el proveedor '.$this->input->post('proveedor').'<br>'
                   . 'domicilio: '.$this->input->post('domicilio').'<br>'
                   . 'telefono: '.$this->input->post('telefono').'<br>'
                   . 'localidad: '.$this->input->post('localidad').'<br>'
                   . 'provincia: '.$provincia['provincia'].'<br>'
                   . 'contacto: '.$this->input->post('contacto').'<br>'
                   . 'observaciones: '.$this->input->post('observaciones'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               redirect('/proveedores/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El proveedor ya existe</div>';
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('proveedores/agregar');
        $this->load->view('layout/footer');
    }
}
?>