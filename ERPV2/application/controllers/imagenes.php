<?php

class Imagenes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'imagenes_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Imágenes';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['imagenes'] = $this->imagenes_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('imagenes/index');
        $this->load->view('imagenes/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Imagen';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('imagen', 'Imagen', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $config['upload_path'] = "./upload/imagenes/";
            $config['allowed_types'] = 'jpg|gif|png|jpeg';
            $config['encrypt_name'] = true;
            $config['remove_spaces'] = true;
            
            $this->load->library('upload', $config);
            $adjunto = null;

            $datos = array(
                'imagen' => $this->input->post('imagen')
            );
            
            if(!$this->upload->do_upload('archivo')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data' => $this->upload->data());
            }

            if($adjunto != null) {
                $datos['archivo'] = '/upload/imagenes/'.$adjunto['upload_data']['file_name'];
                
                $id = $this->imagenes_model->set($datos);
                
                $log = array(
                    'tabla' => 'imagenes',
                    'idtabla' => $id,
                    'texto' => 'Se agregó: <br>'
                     . 'Imagen: '.$this->input->post('imagen').'<br>'
                     . 'Archivo: '.$datos['archivo'].'<br>',
                    'tipo' => 'add',
                    'idusuario' => $session['SID']
                );

                $this->log_model->set($log);
                
                redirect('/imagenes/', 'refresh');
            }
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('imagenes/agregar');
        $this->load->view('imagenes/script');
        $this->load->view('layout_lte/footer');
    }
}