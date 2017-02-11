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
        $data['menu'] = $this->r_session->get_menu();
        
        $data['proveedores'] = $this->proveedores_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('proveedores/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Proveedor';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
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
                    'cuit' => $this->input->post('cuit'),
                    'telefono' => $this->input->post('telefono'),
                    'localidad' => $this->input->post('localidad'),
                    'idprovincia' => $this->input->post('provincia'),
                    'contacto' => $this->input->post('contacto'),
                    'correo' => $this->input->post('correo'),
                    'observaciones' => $this->input->post('observaciones')
                );

               $id = $this->proveedores_model->set($datos); 
               
               $provincia = $this->provincias_model->get_where(array('idprovincia' => $this->input->post('provincia')));
               
               $log = array(
                   'tabla' => 'proveedores',
                   'idtabla' => $id,
                   'texto' => 'Se agregó el proveedor '.$this->input->post('proveedor').'<br>'
                   . 'domicilio: '.$this->input->post('domicilio').'<br>'
                   . 'cuit: '.$this->input->post('cuit').'<br>'
                   . 'telefono: '.$this->input->post('telefono').'<br>'
                   . 'localidad: '.$this->input->post('localidad').'<br>'
                   . 'provincia: '.$provincia['provincia'].'<br>'
                   . 'contacto: '.$this->input->post('contacto').'<br>'
                   . 'correo: '.$this->input->post('correo').'<br>'
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
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('proveedores/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idproveedor = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Proveedor';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        if($idproveedor == null) {
            redirect('/proveedores/', 'refresh');
        }
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'proveedor' => $this->input->post('proveedor'),
                'domicilio' => $this->input->post('domicilio'),
                'cuit' => $this->input->post('cuit'),
                'telefono' => $this->input->post('telefono'),
                'localidad' => $this->input->post('localidad'),
                'idprovincia' => $this->input->post('provincia'),
                'contacto' => $this->input->post('contacto'),
                'correo' => $this->input->post('correo'),
                'observaciones' => $this->input->post('observaciones')
            );
            
            $this->proveedores_model->update($datos, $idproveedor);
            
        }
        
        $datos = array(
            'idproveedor' => $idproveedor
        );
        $data['proveedor'] = $this->proveedores_model->get_where($datos);
        $data['provincias'] = $this->provincias_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('proveedores/modificar');
        $this->load->view('layout_lte/footer');
    }
}
?>