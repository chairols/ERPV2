<?php

class Articulos extends CI_Controller {
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
            'articulos_model',
            'productos_model',
            'log_model',
            'planos_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Artículos';
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
        $data['title'] = 'Agregar Artículo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';  // Se utiliza cuando se repite un artículo ya existente
        
        $data['productos'] = $this->productos_model->gets();
        $data['planos'] = $this->planos_model->gets();
        
        $this->form_validation->set_rules('articulo', 'Artículo', 'required');
        $this->form_validation->set_rules('producto', 'Producto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'articulo' => $this->input->post('articulo')
            );
            $resultado = $this->articulos_model->get_where($datos);
            
            if(count($resultado) == 0 || 1 == 1) {   //  Salteo el if
                $datos = array(
                    'articulo' => $this->input->post('articulo'),
                    'idproducto' => $this->input->post('producto'),
                    'posicion' => $this->input->post('posicion'),
                    'observaciones' => $this->input->post('observaciones')
                );
                if($this->input->post('checkbox') == 'on') {
                    $datos['idplano'] = $this->input->post('plano');
                } else {
                    $datos['idplano'] = 0;
                }
                
                
                $id = $this->articulos_model->set($datos);
                
                $log = array(
                   'tabla' => 'articulos',
                   'idtabla' => $id,
                   'texto' => 'Se agregó: <br>'
                    . 'articulo: '.$this->input->post('articulo').'<br>'
                    . 'idplano: '.$this->input->post('idplano').'<br>'
                    . 'posicion: '.$this->input->post('posicion').'<br>'
                    . 'observaciones: '.$this->input->post('observaciones').'<br>',
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
                
                $this->log_model->set($log);
                
                redirect('/articulos/', 'refresh');
            }
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/agregar');
        $this->load->view('layout/footer');
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
        $data['title'] = 'Artículos Borrados';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets_inactivos();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/borrados');
        $this->load->view('layout/footer');
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
        $data['title'] = 'Ver Artículo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $idarticulo));
        $data['articulo']['producto'] = $this->productos_model->get_where(array('idproducto' => $data['articulo']['idproducto']));
        $data['articulo']['plano'] = $this->planos_model->get_where(array('idplano' => $data['articulo']['idplano']));

        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/ver');
        $this->load->view('layout/footer');
        
    }
}

?>
