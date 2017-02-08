<?php

class Marcas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'marcas_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Marcas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['marcas'] = $this->marcas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('marcas/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Marca';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe el material repetido
        
        $this->form_validation->set_rules('marca', 'Marca', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'marca' => $this->input->post('marca')
            );
            $resultado = $this->marcas_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'marca' => $this->input->post('marca')
                );

               $id = $this->marcas_model->set($datos); 
               
               $log = array(
                   'tabla' => 'marcas',
                   'idtabla' => $id,
                   'texto' => 'Se agregó la marca '.$this->input->post('marca'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               redirect('/marcas/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">La marca ya existe</div>';
            }
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('marcas/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function ver($idmarca = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Ver Marca';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        if($idmarca == null) {
            redirect('/marcas/', 'refresh');
        }
        
        $data['marca'] = $this->marcas_model->get_where(array('idmarca' => $idmarca));
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('marcas/ver');
        $this->load->view('layout/footer');
    }
    
    public function modificar($idmarca = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Modificar Marca';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        if($idmarca == null) {
            redirect('/marcas/', 'refresh');
        }
        
        $this->form_validation->set_rules('marca', 'Marca', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'marca' => $this->input->post('marca')
            );
            
            $this->marcas_model->update($datos, $idmarca);
            
            $log = array(
                'tabla' => 'marcas',
                'idtabla' => $idmarca,
                'texto' => 'Se modificó: <br>'
                 . 'marca: '.$this->input->post('marca'),
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
            
            redirect('/marcas/', 'refresh');
        }
        
        $data['marca'] = $this->marcas_model->get_where(array('idmarca' => $idmarca));
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('marcas/modificar');
        $this->load->view('layout/footer');
    }
}
?>