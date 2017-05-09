<?php

class Certificados extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'articulos_model',
            'clientes_model',
            'plantillas_model',
            'productos_model',
            'certificados_model',
            'log_model'
        ));
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Certificados';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('certificados/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Certificado';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['articulos'] = $this->articulos_model->gets();
        $data['clientes'] = $this->clientes_model->gets();
        $data['plantillas'] = $this->plantillas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('certificados/agregar');
        $this->load->view('certificados/script');
        $this->load->view('layout_lte/footer');
    }
    
    public function ajax_numero() {
        $resultado = $this->certificados_model->get_ultimo_numero_certificado();
        $data['numero'] = 0;
        if($resultado['numero'] == null) {
            $data['numero'] = 1;
        } else {
            $data['numero'] = $resultado['numero']+1;
        }
        $this->load->view('certificados/ajax_numero', $data);
    }
    
    public function agregar_post() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $this->form_validation->set_rules('numero', 'Número de Certificado', 'required|integer');
        $this->form_validation->set_rules('articulo', 'Artículo', 'required|integer');
        $this->form_validation->set_rules('numero_serie', 'Número de Serie', 'required|integer');
        $this->form_validation->set_rules('cliente', 'Cliente', 'required|integer');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('plantilla', 'Plantilla', 'required|integer');
        
        if($this->form_validation->run() == FALSE) {
            $json = array(
                'status' => 'error',
                'data' => validation_errors()
            );
            echo json_encode($json);
        } else {
            $datos = array(
                'numero_certificado' => $this->input->post('numero'),
                'idarticulo' => $this->input->post('articulo'),
                'numero_serie' => $this->input->post('numero_serie'),
                'idcliente' => $this->input->post('cliente'),
                'fecha' => $this->input->post('fecha')
            );
            
            $array = array(
                'idplantilla' => $this->input->post('plantilla')
            );
            $plantilla = $this->plantillas_model->get_where($array);
            
            $datos['certificado'] = $plantilla['plantilla'];
            
            $idcertificado = $this->certificados_model->set($datos);
            
            $array = array(
                'idarticulo' => $this->input->post('articulo')
            );
            $articulo = $this->articulos_model->get_where($array);
            
            $array = array(
                'idproducto' => $articulo['idproducto']
            );
            $producto = $this->productos_model->get_where($array);
            
            $array = array(
                'idcliente' => $this->input->post('cliente')
            );
            $cliente = $this->clientes_model->get_where($array);
            
            $log = array(
                'tabla' => 'certificados',
                'idtabla' => $idcertificado,
                'texto' => 'Se agregó el certificado <br> '
                . 'Número de Certificado: '.$this->input->post('numero_certificado').'<br>'
                . 'Artículo: '.$producto['producto'].' '.$articulo['articulo'].'<br>'
                . 'Número de Serie: '.$this->input->post('numero_serie').'<br>'
                . 'Cliente: '.$cliente['cliente'].'<br>'
                . 'Fecha: '.$this->input->post('fecha').'<br>'
                . 'Certificado: '.$datos['certificado'].'<br>',
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
            
            
            if($idcertificado > 0) {
                $json = array(
                    'status' => 'ok',
                    'id' => $idcertificado
                );
                echo json_encode($json);
            } else {
                $json = array(
                    'status' => 'error',
                    'data' => 'No se pudo agregar'
                );
                echo json_encode($json);
            }
            
        }
    }
}
?>