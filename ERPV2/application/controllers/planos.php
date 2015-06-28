<?php

class Planos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'planos_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Planos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['planos'] = $this->planos_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('planos/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Plano';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('plano', 'Plano', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
             $datos = array(
                 'plano' => $this->input->post('plano'),
                 'revision' => $this->input->post('revision')
            );
            $resultado = $this->planos_model->get_where($datos);
            
            if(count($resultado) == 0) {
                $datos = array(
                    'plano' => $this->input->post('plano'),
                    'revision' => $this->input->post('revision'),
                    'observaciones' => $this->input->post('observaciones'),
                    'activo' => '1'
                );
                if($this->input->post('propio') == 'on') {
                    $datos['propio'] = '1';
                } else {
                    $datos['propio'] = '0';
                }
                
                $config['upload_path'] = "./upload/planos/";
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;
                $config['remove_spaces'] = true;
                
                $this->load->library('upload', $config);
                $adjunto = null;
               
                if(!$this->upload->do_upload('planofile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $adjunto = array('upload_data' => $this->upload->data());
                }
                
                if($adjunto != null) {
                    $datos['planofile'] = '/upload/planos/'.$adjunto['upload_data']['file_name'];
                }
                
                $id = $this->planos_model->set($datos);
                
                $log = array(
                   'tabla' => 'planos',
                   'idtabla' => $id,
                   'texto' => 'Se agregó: <br>'
                    . 'plano: '.$this->input->post('plano').'<br>'
                    . 'revision: '.$this->input->post('revision').'<br>'
                    . 'plano propio '.$datos['propio'].'<br>'
                    . 'observaciones: '.$this->input->post('observaciones').'<br>'
                    . 'adjunto: '.'/upload/planos/'.$adjunto['upload_data']['file_name'],
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
                );
                
                $this->log_model->set($log);
                
                redirect('/planos/', 'refresh');
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('planos/agregar');
        $this->load->view('layout/footer');
    }
    
    public function ver($idplano = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Ver Plano';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        if($idplano == null) {
            redirect('/planos/', 'refresh');
        }
        $datos = array(
            'idplano' => $idplano
        );
        $data['plano'] = $this->planos_model->get_where($datos);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('planos/ver');
        $this->load->view('layout/footer');
    }
    
    public function borrar($idplano = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        if($idplano == null) {
            redirect('/planos/', 'refresh');
        }
        
        $datos = array(
            'activo' => 0
        );
        
        $this->planos_model->update($datos, $idplano);
        
        $log = array(
            'tabla' => 'planos',
            'idtabla' => $idplano,
            'texto' => 'Se borró el plano',
            'tipo' => 'del',
            'idusuario' => $session['SID']
        );

        $this->log_model->set($log);
        
        redirect('/planos/borrados/', 'refresh');
    }
    
    public function borrados() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Planos Borrados';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $datos = array(
            'activo' => '0'
        );
        $data['planos'] = $this->planos_model->gets_where($datos);
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('planos/borrados');
        $this->load->view('layout/footer');
    }
    
    public function modificar($idplano = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idplano == null) {
            redirect('/planos/', 'refresh');
        }
        $data['title'] = 'Modificar Plano';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';
        
        
        
        $this->form_validation->set_rules('plano', 'Plano', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'plano' => $this->input->post('plano'),
                'revision' => $this->input->post('revision'),
                'observaciones' => $this->input->post('observaciones')
            );
            if($this->input->post('propio') == 'on') {
                $datos['propio'] = '1';
            } else {
                $datos['propio'] = '0';
            }
            
            $config['upload_path'] = "./upload/planos/";
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = true;
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);
            $adjunto = null;

            if(!$this->upload->do_upload('planofile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data' => $this->upload->data());
            }

            if($adjunto != null) {
                $datos['planofile'] = '/upload/planos/'.$adjunto['upload_data']['file_name'];
            }
            
            $this->planos_model->update($datos, $idplano);
            
            $log = array(
                'tabla' => 'planos',
                'idtabla' => $idplano,
                'texto' => 'Se modificó: <br>'
                 . 'plano: '.$this->input->post('plano').'<br>'
                 . 'revisión: '.$this->input->post('revision').'<br>'
                 . 'plano propio: '.($datos['propio'])?"SI":"NO".'<br>'
                 . 'archivo: '.($datos['planofile'])?$datos['planofile']:"".'<br>'
                 . 'observaciones: '.$this->input->post('observaciones').'<br>',
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );
            
            $this->log_model->set($log);
        }
        
        $datos = array(
            'idplano' => $idplano
        );
        $data['plano'] = $this->planos_model->get_where($datos);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('planos/modificar');
        $this->load->view('layout/footer');
    }
    
    public function borrararchivo($idplano = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        if($idplano == null) {
            redirect('/planos/', 'refresh');
        }
        
        $datos = array(
            'planofile' => ''
        );
        
        $this->planos_model->update($datos, $idplano);
        
        $log = array(
            'tabla' => 'planos',
            'idtabla' => $idplano,
            'texto' => 'Se borró el archivo del plano',
            'tipo' => 'del',
            'idusuario' => $session['SID']
        );

        $this->log_model->set($log);
        
        redirect('/planos/modificar/'.$idplano.'/', 'refresh');
    }
}

?>