<?php

class Roles extends CI_Controller {
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
            'roles_model',
            'log_model',
            'menu_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Roles';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['roles'] = $this->roles_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('roles/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Rol';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['alerta'] = '';  // Se utiliza si existe el rol repetido
        
        $this->form_validation->set_rules('rol', 'Rol', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'rol' => $this->input->post('rol')
            );
            $resultado = $this->roles_model->get_where($datos);
            
            if(!count($resultado)) {
                $datos = array(
                    'rol' => $this->input->post('rol'),
                    'activo' => '1'
                );
                
                $id = $this->roles_model->set($datos);
                
                $log = array(
                   'tabla' => 'roles',
                   'idtabla' => $id,
                   'texto' => 'Se agregó el rol '.$this->input->post('rol'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               redirect('/roles/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El rol ya existe</div>';
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('roles/agregar');
        $this->load->view('layout/footer');
    }
    
    public function menu($idrol = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Roles-Menú';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        if($idrol == null) {
            redirect('/roles/', 'refresh');
        }
        
        
        $data['rol'] = $this->roles_model->get_where(array('idrol' => $idrol));
        
        $data['menu'] = $this->menu_model->obtener_menu_por_padre(0);
        foreach ($data['menu'] as $key => $value) {
            $data['menu'][$key]['submenu'] = $this->menu_model->obtener_menu_por_padre($value['idmenu']);
        }
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('roles/menu');
        $this->load->view('layout/footer');
    }
}

?>