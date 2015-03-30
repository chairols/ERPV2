<?php

class Clientes extends CI_Controller {
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
            'clientes_model',
            'provincias_model',
            'log_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Clientes';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['clientes'] = $this->clientes_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('clientes/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Cliente';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';  // Se utiliza si existe el proveedor repetida
        
        $data['provincias'] = $this->provincias_model->gets();
        
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'cliente' => $this->input->post('cliente')
            );
            $resultado = $this->clientes_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'cliente' => $this->input->post('cliente'),
                    'domicilio' => $this->input->post('domicilio'),
                    'telefono' => $this->input->post('telefono'),
                    'localidad' => $this->input->post('localidad'),
                    'idprovincia' => $this->input->post('provincia'),
                    'contacto' => $this->input->post('contacto'),
                    'correo' => $this->input->post('correo'),
                    'observaciones' => $this->input->post('observaciones')
                );

               $id = $this->clientes_model->set($datos); 
               
               $provincia = $this->provincias_model->get_where(array('idprovincia' => $this->input->post('provincia')));
               
               $log = array(
                   'tabla' => 'clientes',
                   'idtabla' => $id,
                   'texto' => 'Se agregó el cliente '.$this->input->post('cliente').'<br>'
                   . 'domicilio: '.$this->input->post('domicilio').'<br>'
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
               
               redirect('/clientes/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El cliente ya existe</div>';
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('clientes/agregar');
        $this->load->view('layout/footer');
    }
    
    public function modificar($idcliente = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idcliente == null) {
            redirect('/clientes/', 'refresh');
        }
        $data['title'] = 'Modificar Cliente';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';
        
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {


            $datos = array(
                'cliente' => $this->input->post('cliente'),
                'domicilio' => $this->input->post('domicilio'),
                'telefono' => $this->input->post('telefono'),
                'localidad' => $this->input->post('localidad'),
                'idprovincia' => $this->input->post('provincia'),
                'contacto' => $this->input->post('contacto'),
                'correo' => $this->input->post('correo'),
                'observaciones' => $this->input->post('observaciones')
            );

            $this->clientes_model->update($datos, $idcliente);

            $provincia = $this->provincias_model->get_where(array('idprovincia' => $this->input->post('provincia')));

            $log = array(
                'tabla' => 'clientes',
                'idtabla' => $idcliente,
                'texto' => 'Se modificó el cliente '.$this->input->post('cliente').'<br>'
                . 'domicilio: '.$this->input->post('domicilio').'<br>'
                . 'telefono: '.$this->input->post('telefono').'<br>'
                . 'localidad: '.$this->input->post('localidad').'<br>'
                . 'provincia: '.$provincia['provincia'].'<br>'
                . 'contacto: '.$this->input->post('contacto').'<br>'
                . 'correo: '.$this->input->post('correo').'<br>'
                . 'observaciones: '.$this->input->post('observaciones'),
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);

            redirect('/clientes/', 'refresh');
        }
        
        
        $datos = array(
            'idcliente' => $idcliente
        );
        $data['cliente'] = $this->clientes_model->get_where($datos);
        
        $data['provincias'] = $this->provincias_model->gets();
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('clientes/modificar');
        $this->load->view('layout/footer');
    }
}
?>