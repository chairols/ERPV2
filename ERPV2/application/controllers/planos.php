<?php

class Planos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'beans'
        ));
        $this->load->model(array(
            'planos_model',
            'log_model',
            'clientes_model'
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
        $data['menu'] = $this->r_session->get_menu();
        
        $data['planos'] = $this->planos_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('planos/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Plano';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('plano', 'Plano', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
             $datos = array(
                 'plano' => $this->input->post('plano'),
                 'revision' => $this->input->post('revision')
            );
            $resultado = $this->planos_model->get_where($datos);
            $cliente = null;
            
            if(count($resultado) == 0) {
                $datos = array(
                    'plano' => $this->input->post('plano'),
                    'revision' => $this->input->post('revision'),
                    'observaciones' => $this->input->post('observaciones'),
                    'activo' => '1'
                );
                if($this->input->post('checkbox') == 'on') {
                    $datos['idcliente'] = $this->input->post('cliente');
                    $where = array(
                        'idcliente' => $this->input->post('cliente')
                    );
                    $c = $this->clientes_model->get_where($where);
                    $cliente = $c['cliente'];
                } else {
                    $datos['idcliente'] = '0';
                    $cliente = 'No especifica';
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
                    . 'cliente: '.$cliente.'<br>'
                    . 'observaciones: '.$this->input->post('observaciones').'<br>'
                    . 'adjunto: '.'/upload/planos/'.$adjunto['upload_data']['file_name'],
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
                );
                
                $this->log_model->set($log);
                
                redirect('/planos/', 'refresh');
            }
        }
        
        $data['clientes'] = $this->clientes_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('planos/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function ver($idplano = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Ver Plano';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        if($idplano == null) {
            redirect('/planos/', 'refresh');
        }
        /*
        $datos = array(
            'idplano' => $idplano
        );
        $data['plano'] = $this->planos_model->get_where($datos);
        */
        $data['plano'] = new PlanosBean();
        $data['plano']->setId($idplano);
        $data['plano']->armarPlanoPorID();
        
        
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
        $data['menu'] = $this->r_session->get_menu();
        
        $data['planos'] = $this->planos_model->gets_borrados();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('planos/borrados');
        $this->load->view('layout_lte/footer');
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
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';
        
        
        
        $this->form_validation->set_rules('plano', 'Plano', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'plano' => $this->input->post('plano'),
                'revision' => $this->input->post('revision'),
                'observaciones' => $this->input->post('observaciones')
            );
            
            $cliente = null;
            if($this->input->post('checkbox') == 'on') {
                $datos['idcliente'] = $this->input->post('cliente');
                $where = array(
                    'idcliente' => $this->input->post('cliente')
                );
                $c = $this->clientes_model->get_where($where);
                $cliente = $c['cliente'];
            } else {
                $datos['idcliente'] = '0';
                $cliente = 'No especifica';
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
            
            $plano = '';
            if(isset($datos['planofile'])) {
                $plano = $datos['planofile'];
            }
            $log = array(
                'tabla' => 'planos',
                'idtabla' => $idplano,
                'texto' => 'Se modificó: <br>'
                 . 'plano: '.$this->input->post('plano').'<br>'
                 . 'revisión: '.$this->input->post('revision').'<br>'
                 . 'cliente: '.$cliente.'<br>'
                 . 'archivo: '.$plano.'<br>'
                 . 'observaciones: '.$this->input->post('observaciones').'<br>',
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );
            
            $this->log_model->set($log);
            
            redirect('/planos/', 'refresh');
        }
        
        $datos = array(
            'idplano' => $idplano
        );
        $data['plano'] = $this->planos_model->get_where($datos);
        $data['clientes'] = $this->clientes_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('planos/modificar');
        $this->load->view('layout_lte/footer');
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