<?php

class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'usuarios_model',
            'roles_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        
        
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Usuarios';
        $data['session'] = $session;
        $this->r_session->check($this->session->all_userdata());
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['usuarios'] = $this->usuarios_model->gets();
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('usuarios/index');
        $this->load->view('layout_alela/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Usuario';
        $data['session'] = $session;
        $this->r_session->check($this->session->all_userdata());
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'usuario' => $this->input->post('usuario')
            );
            $usuario = $this->usuarios_model->get_where($datos);
            
            if(count($usuario) == 0) {
                $datos = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'correo' => $this->input->post('correo'),
                    'usuario' => $this->input->post('usuario'),
                    'password' => $this->input->post('password'),
                    'tipo_usuario' => $this->input->post('rol')
                );
                $this->usuarios_model->set($datos);
                
                redirect('/usuarios/', 'refresh');
            }
            
        }
        
        $data['roles'] = $this->roles_model->gets();
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('usuarios/agregar');
        $this->load->view('layout_alela/footer');
    }
    
    public function modificar($idusuario = null) {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Usuarios';
        $data['session'] = $session;
        $this->r_session->check($this->session->all_userdata());
        if($idusuario == null) {
            redirect('/usuarios/', 'refresh');
        }
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        /*
         *  desarrollar
         */
        
        $datos = array(
            'idusuario' => $idusuario
        );
        $data['usuario'] = $this->usuarios_model->get_where($datos);
        
        $data['roles'] = $this->roles_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('usuarios/modificar');
        $this->load->view('layout/footer');
    }
    
    
    
    public function login() {
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $usuario = $this->usuarios_model->get_usuario($this->input->post('usuario'), $this->input->post('password'));
            if(!empty($usuario)) {
                $datos = array(
                    'SID' => $usuario['idusuario'],
                    'usuario' => $usuario['usuario'],
                    'nombre' => $usuario['nombre'],
                    'apellido' => $usuario['apellido'],
                    'correo' => $usuario['correo'],
                    'tipo_usuario' => $usuario['tipo_usuario']
                );
                $this->session->set_userdata($datos);
                redirect('/dashboard/', 'refresh');
            }
        }
        
        $session = $this->session->all_userdata();
        if(!empty($session['SID'])) {
            redirect('/dashboard/', 'refresh');
        } else {
            $this->load->view('usuarios/login');
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('/usuarios/login/', 'refresh');
    } 
    
    public function perfil() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Perfil';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $usuario = $this->usuarios_model->get($session['SID']);
            
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'correo' => $this->input->post('correo')
            );
            
            if($usuario['password'] == $this->input->post('passactual')) {
                if($this->input->post('password') == $this->input->post('password2')) {
                    $datos['password'] = $this->input->post('password');
                }
            }
            
            $this->usuarios_model->update($datos, $session['SID']);
        }
        
        $data['usuario'] = $this->usuarios_model->get($session['SID']);
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('usuarios/perfil');
        $this->load->view('layout_lte/footer');
    }
}

?>