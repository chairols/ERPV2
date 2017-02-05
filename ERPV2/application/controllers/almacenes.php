<?php

class Almacenes extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'almacenes_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Almacenes';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['almacenes'] = $this->almacenes_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('almacenes/index', $data);
        $this->load->view('layout_lte/footer');
    }
    
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Almacén';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe el material repetido
        
        $this->form_validation->set_rules('almacen', 'Almacén', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'almacen' => $this->input->post('almacen')
            );
            $resultado = $this->almacenes_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'almacen' => $this->input->post('almacen')
                );

               $id = $this->almacenes_model->set($datos); 

               $log = array(
                   'tabla' => 'almacenes',
                   'idtabla' => $id,
                   'texto' => 'Se agregó el almacén '.$this->input->post('almacen'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               redirect('/almacenes/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El almacén ya existe</div>';
            }
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('almacenes/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idalmacen = null) {
        $session = $this->session->all_userdata();
        if($idalmacen == null) {
            redirect('/almacenes/', 'refresh');
        }
        $data['title'] = 'Modificar Almacén';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe el almacén repetido
        
        $this->form_validation->set_rules('almacen', 'Almacén', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'almacen' => $this->input->post('almacen')
            );
            $resultado = $this->almacenes_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'almacen' => $this->input->post('almacen')
                );
                $this->almacenes_model->update($datos, $idalmacen);
                
                $log = array(
                    'tabla' => 'almacenes',
                    'idtabla' => $idalmacen,
                    'texto' => "Se modificó: <br>"
                    . "Almacén: ".$this->input->post('almacen'),
                    'tipo' => 'edit',
                    'idusuario' => $session['SID']
                );
                $this->log_model->set($log);


                redirect('/almacenes/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El almacén ya existe</div>';
            }
        }
        
        $data['almacen'] = $this->almacenes_model->get_where(array('idalmacen' => $idalmacen));
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('almacenes/modificar');
        $this->load->view('layout_alela/footer');
    }
    
    public function ver($idalmacen = null) {
        $session = $this->session->all_userdata();
        if($idalmacen == null) {
            redirect('/almacenes/', 'refresh');
        }
        $data['title'] = 'Ver Almacén';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['almacen'] = $this->almacenes_model->get_where(array('idalmacen' => $idalmacen));
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('almacenes/ver');
        $this->load->view('layout_alela/footer');
    }
}
?>