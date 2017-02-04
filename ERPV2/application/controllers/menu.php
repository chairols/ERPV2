<?php

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'menu_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Menú';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['mmenu'] = $this->menu_model->gets();
        foreach ($data['mmenu'] as $key => $value) {
            $datos = array(
                'idmenu' => $value['padre']
            );
            $data['mmenu'][$key]['padre'] = $this->menu_model->get_where($datos);
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('menu/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idmenu = null) {
        $session = $this->session->all_userdata();
        $data['title'] = 'Modificar Menú';
        $data['session'] = $session;
        if($idmenu == null) {
            redirect('/menu/', 'refresh');
        }
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('menu', 'Menú', 'required');
        $this->form_validation->set_rules('href', 'HREF', 'required');
        $this->form_validation->set_rules('orden', 'Orden', 'required|integer');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'icono' => $this->input->post('icono'),
                'menu' => $this->input->post('menu'),
                'href' => $this->input->post('href'),
                'orden' => $this->input->post('orden'),
                'padre' => $this->input->post('padre')
            );
            if($this->input->post('visible') == 'on') {
                $datos['visible'] = 1;
            } else {
                $datos['visible'] = 0;
            }
            
            $this->menu_model->update($datos, $idmenu);
            
            redirect('/menu/', 'refresh');
        }
        
        $datos = array(
            'padre' => '0',
            'visible' => '1'
        );
        $data['padres'] = $this->menu_model->gets_where($datos);
        
        $datos = array(
            'idmenu' => $idmenu
        );
        $data['mmenu'] = $this->menu_model->get_where($datos);
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('menu/modificar');
        $this->load->view('layout_alela/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Menú';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('href', 'HREF', 'required');
        $this->form_validation->set_rules('orden', 'Orden', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'icono' => $this->input->post('icono'),
                'menu' => $this->input->post('menu'),
                'href' => $this->input->post('href'),
                'orden' => $this->input->post('orden'),
                'padre' => $this->input->post('padre')
            );
            if($this->input->post('visible') == 'on')
                $datos['visible'] = '1';
            
            $this->menu_model->set($datos);
            
            redirect('/menu/', 'refresh');
        }
        
        
        $datos = array(
            'padre' => '0',
            'visible' => '1'
        );
        $data['padres'] = $this->menu_model->gets_where($datos);
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('menu/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function roles($idmenu = null) {
        $session = $this->session->all_userdata();
        $data['title'] = 'Asociar Menu';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        if($idmenu == null) {
            redirect('/menu/', 'refresh');
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('menu/roles');
        $this->load->view('layout/footer');
    }
}
?>