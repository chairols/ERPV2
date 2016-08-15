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
            'planos_model',
            'articulos_jerarquias_model'
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
        $data['articulos'] = $this->articulos_model->gets();
        
        $this->form_validation->set_rules('articulo', 'Artículo', 'required');
        $this->form_validation->set_rules('producto', 'Producto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            
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

            if($this->input->post('padres')) {
                foreach($this->input->post('padres') as $padre) {
                    $datos = array(
                        'idarticulo_padre' => $padre,
                        'idarticulo_hijo' => $id
                    );
                    $this->articulos_jerarquias_model->set($datos);
                }
            }


            if($this->input->post('hijos')) {
                foreach($this->input->post('hijos') as $hijo) {
                    $datos = array(
                        'idarticulo_padre' => $id,
                        'idarticulo_hijo' => $hijo
                    );
                    $this->articulos_jerarquias_model->set($datos);
                }
            }
                
            redirect('/articulos/', 'refresh');
            
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
        $data['title'] = 'Modificar Artículo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';
        
        $datos = array(
            'idarticulo' => $idarticulo
        );
        $data['articulo'] = $this->articulos_model->get_where($datos);
        
        $data['planos'] = $this->planos_model->gets();
        
        $data['productos'] = $this->productos_model->gets();
        
        
        
        $this->form_validation->set_rules('articulo', 'Artículo', 'required');
        $this->form_validation->set_rules('producto', 'Producto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
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
            
            $this->articulos_model->update($datos, $idarticulo);
            
            $plano['plano'] = 'No tiene';
            if($this->input->post('checkbox') == 'on') {
                $datos = array(
                    'idplano' => $this->input->post('plano')
                );
                $plano = $this->planos_model->get_where($datos);
            }
            $log = array(
                'tabla' => 'articulos',
                'idtabla' => $idarticulo,
                'texto' => 'Se modificó: <br>'
                 . 'articulo: '.$this->input->post('articulo').'<br>'
                 . 'plano: '.$plano['plano'].'<br>'
                 . 'posicion: '.$this->input->post('posicion').'<br>'
                 . 'observaciones: '.$this->input->post('observaciones').'<br>',
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
            
            $this->articulos_jerarquias_model->borrar_jerarquias($idarticulo);
            
            if($this->input->post('padres')) {
                foreach($this->input->post('padres') as $padre) {
                    $datos = array(
                        'idarticulo_padre' => $padre,
                        'idarticulo_hijo' => $idarticulo
                    );
                    $this->articulos_jerarquias_model->set($datos);
                }
            }
            
            if($this->input->post('hijos')) {
                foreach($this->input->post('hijos') as $hijo) {
                    $datos = array(
                        'idarticulo_padre' => $idarticulo,
                        'idarticulo_hijo' => $hijo
                    );
                    $this->articulos_jerarquias_model->set($datos);
                }
            }
            
            redirect('/articulos/', 'refresh');
        }
        
        $data['padres'] = $this->articulos_jerarquias_model->gets_combo_padre($idarticulo);
        $data['hijos'] = $this->articulos_jerarquias_model->gets_combo_hijo($idarticulo);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('articulos/modificar');
        $this->load->view('layout/footer');
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
