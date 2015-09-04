<?php

class Stock extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'articulos_model',
            'productos_model',
            'medidas_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/index');
        $this->load->view('layout/footer');
    }
    
    public function modificar($idarticulo = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idarticulo == null) {
            redirect('/stock/', 'refresh');
        }
        $data['title'] = 'Modificar Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('unidad_medida', 'Unidad de Medida', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'cantidad' => $this->input->post('cantidad'),
                'unidad_medida' => $this->input->post('unidad_medida'),
                'ubicacion' => $this->input->post('ubicacion')
            );
            $this->articulos_model->update($datos, $idarticulo);
            
            $datos = array(
                'idmedida' => $this->input->post('unidad_medida')
            );
            $unidad_medida = $this->medidas_model->get_where($datos);
            
            $log = array(
               'tabla' => 'articulos',
               'idtabla' => $idarticulo,
               'texto' => 'Se modificó el stock: <br>'
                . 'Cantidad: '.$this->input->post('cantidad').'<br>'
                . 'Unidad de Medida: '.$unidad_medida['medida_larga'].'<br>'
                . 'Ubicación: '.$this->input->post('ubicacion'),
               'tipo' => 'edit',
               'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
            
            redirect('/stock/', 'refresh');
        }
        
        $datos = array(
            'idarticulo' => $idarticulo
        );
        $data['articulo'] = $this->articulos_model->get_where($datos);
        
        $datos = array(
            'idproducto' => $data['articulo']['idproducto']
        );
        $data['producto'] = $this->productos_model->get_where($datos);
        
        $data['medidas'] = $this->medidas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/modificar');
        $this->load->view('layout/footer');
    }
    
    public function ver($idarticulo = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idarticulo == null) {
            redirect('/stock/', 'refresh');
        }
        $data['title'] = 'Ver Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $datos = array(
            'idarticulo' => $idarticulo
        );
        $data['articulo'] = $this->articulos_model->get_where($datos);
        
        $datos = array(
            'idproducto' => $data['articulo']['idproducto']
        );
        $data['producto'] = $this->productos_model->get_where($datos);
        
        $datos = array(
            'idmedida' => $data['articulo']['unidad_medida']
        );
        $data['medida'] = $this->medidas_model->get_where($datos);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/ver');
        $this->load->view('layout/footer');
    }
    
    public function con_stock() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Artículos con Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets_con_stock();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/con_stock');
        $this->load->view('layout/footer');
    }
}
?>