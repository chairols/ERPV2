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
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Menú';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['menu'] = $this->menu_model->gets();
        foreach ($data['menu'] as $key => $value) {
            $datos = array(
                'idmenu' => $value['padre']
            );
            $data['menu'][$key]['padre'] = $this->menu_model->get_where($datos);
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('menu/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Menú';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('href', 'HREF', 'required');
        $this->form_validation->set_rules('orden', 'Orden', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
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
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('menu/agregar');
        $this->load->view('layout/footer');
    }
}
?>