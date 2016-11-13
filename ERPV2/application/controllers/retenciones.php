<?php

class Retenciones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'proveedores_model',
            'monedas_model',
            'retenciones_model',
            'log_model',
            'padron_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Retenciones';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('retenciones/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Retención';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
        $this->form_validation->set_rules('moneda', 'Moneda', 'required');
        $this->form_validation->set_rules('porcentaje', 'Porcentaje', 'required|numeric');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        
        if($this->form_validation->run() == FALSE) {
             
        } else {
            $datos = array(
                'idproveedor' => $this->input->post('proveedor'),
                'idmoneda' => $this->input->post('moneda'),
                'porcentaje' => $this->input->post('porcentaje'),
                'fecha' => $this->input->post('fecha')
            );
            
            $idretencion = $this->retenciones_model->set($datos);
            
            $proveedor = $this->proveedores_model->get_where(array('idproveedor' => $this->input->post('proveedor')));
            $moneda = $this->monedas_model->get_where(array('idmoneda' => $this->input->post('moneda')));
            
            $log = array(
                'tabla' => 'retenciones',
                'idtabla' => $idretencion,
                'texto' => 'Se agregó: <br>'
                 . 'Proveedor: '.$proveedor['proveedor'].'<br>'
                 . 'Moneda: '.$moneda['moneda'].'<br>'
                 . 'Porcentaje: '.$this->input->post('porcentaje').'<br>'
                 . 'Fecha: '.$this->input->post('fecha').'<br>',
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
                
            redirect('/retenciones/agregar_items/'.$idretencion.'/', 'refresh');
        }
         
        $data['proveedores'] = $this->proveedores_model->gets();
        $data['monedas'] = $this->monedas_model->gets();
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('retenciones/agregar');
        $this->load->view('layout/footer_form');
    }
    
    public function agregar_items($idretencion = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Retención';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('punto_de_venta', 'Punto de Venta', 'integer');
        $this->form_validation->set_rules('factura', 'Factura', 'required|integer');
        $this->form_validation->set_rules('fecha_factura', 'Fecha de Factura', 'required');
        $this->form_validation->set_rules('base_imponible', 'Base Imponible', 'required|numeric');
        
        $data['retencion'] = $this->retenciones_model->get_where(array('idretencion' => $idretencion));
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
        
            $factura = "";
            if(strlen($this->input->post('punto_de_venta'))) {
                $factura = str_pad($this->input->post('punto_de_venta'), 4, "0", STR_PAD_LEFT)."-";
            }
            $factura .= str_pad($this->input->post('factura'), 8, "0", STR_PAD_LEFT);
            $retencion = ($this->input->post('base_imponible') * $data['retencion']['porcentaje'])/100;
            $retencion = round($retencion, 2);
            $datos = array(
                'idretencion' => $idretencion,
                'factura' => $factura,
                'fecha' => $this->input->post('fecha_factura'),
                'base_imponible' => round($this->input->post('base_imponible'), 2),
                'retencion' => round(number_format($retencion, 2, ".", ""), 2)
            );
            
            $this->retenciones_model->set_item($datos);
        }
        
        $data['items'] = $this->retenciones_model->gets_items($idretencion);
        $data['proveedor'] = $this->proveedores_model->get_where(array('idproveedor' => $data['retencion']['idproveedor']));
        $data['moneda'] = $this->monedas_model->get_where(array('idmoneda' => $data['retencion']['idmoneda']));
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('retenciones/agregar_items');
        $this->load->view('layout/footer_form');
    }
}
?>