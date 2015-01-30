<?php

class Articulos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'uri'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'articulos_model',
            'productos_model',
            'log_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';  // Se utiliza cuando se repite un artículo ya existente
        
        $data['productos'] = $this->productos_model->gets();
        
        $this->form_validation->set_rules('articulo', 'Artículo', 'required');
        $this->form_validation->set_rules('producto', 'Producto', 'required');
        $this->form_validation->set_rules('revision', 'Revisión', 'integer');
        $this->form_validation->set_rules('posicion', 'Posición', 'integer');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'articulo' => $this->input->post('articulo')
            );
            $resultado = $this->articulos_model->get_where($datos);
            
            if(count($resultado) == 0 || 1 == 1) {   //  Salteo el if
                $datos = array(
                    'articulo' => $this->input->post('articulo'),
                    'plano' => $this->input->post('plano'),
                    'idproducto' => $this->input->post('producto'),
                    'revision' => $this->input->post('revision'),
                    'posicion' => $this->input->post('posicion'),
                    'observaciones' => $this->input->post('observaciones')
                );
                
                $config['upload_path'] = "./upload/";
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
                    $datos['planofile'] = '/upload/'.$adjunto['upload_data']['file_name'];
                }
                        
                $id = $this->articulos_model->set($datos);
                
                $log = array(
                   'tabla' => 'articulos',
                   'idtabla' => $id,
                   'texto' => 'Se agregó: <br>'
                    . 'articulo: '.$this->input->post('articulo').'<br>'
                    . 'plano: '.$this->input->post('plano').'<br>'
                    . 'idplano: '.$this->input->post('idplano').'<br>'
                    . 'revision: '.$this->input->post('revision').'<br>'
                    . 'posicion: '.$this->input->post('posicion').'<br>'
                    . 'observaciones: '.$this->input->post('observaciones').'<br>'
                    . 'adjunto: '.'/upload/'.$adjunto['upload_data']['file_name'],
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
                
                $this->log_model->set($log);
                
                redirect('/articulos/', 'refresh');
            }
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/agregar');
        $this->load->view('layout/footer_form');
    }
    
    public function modificar($idarticulo = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idarticulo == null) {
            redirect('/articulos/', 'refresh');
        }
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/modificar');
        $this->load->view('layout/footer_form');
    }
    
    public function borrados() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets_inactivos();
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/borrados');
        $this->load->view('layout/footer_datatable');
    }
    
    public function borrar($idarticulo = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        if($idarticulo == null) {
            redirect('/articulos/', 'refresh');
        }
        
        $datos = array(
            'activo' => 0
        );
        
        $this->articulos_model->update($datos, $idarticulo);
        
        $log = array(
                   'tabla' => 'articulos',
                   'idtabla' => $idarticulo,
                   'texto' => 'Se borró el artículo',
                   'tipo' => 'del',
                   'idusuario' => $session['SID']
               );
                
                $this->log_model->set($log);
        
        redirect('/articulos/borrados/', 'refresh');
    }
    
    public function ver($idarticulo = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idarticulo == null) {
            redirect('/articulos/', 'refresh');
        }
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $idarticulo));
        $data['articulo']['producto'] = $this->productos_model->get_where(array('idproducto' => $data['articulo']['idproducto']));

        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/ver');
        $this->load->view('layout/footer_form');
        
    }
}

?>
