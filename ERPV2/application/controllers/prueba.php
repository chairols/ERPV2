<?php

class Prueba extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session',
            'r_session'
        ));
        $this->load->helper(array(
            'url'
        ));
        
    }
    
    public function index() {
        $data['session']['nombre'] = 'Juan';
        $data['session']['apellido'] = 'Perez';
        $data['alerta'] = '';
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        //$this->load->view('provincias/agregar');
        $this->load->view('prueba/index');
        $this->load->view('layout/footer_form');
    }
    
    public function nulo() {
        $this->load->model(array(
            'prueba_model'
        ));
        
        $array['date'] = null;
        
        $this->prueba_model->set($array);
        
    }
    
    public function pdf() {
        $this->load->library('pdf_ot');
        $this->load->model('ots_model');
        
        $ot = $this->ots_model->get_where(array('idot' => '6'));
        
        $this->pdf = new Pdf_ot();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        
        // Primer cuadro
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Line(10, 40, 200, 40);
        $this->pdf->Line(10, 48, 200, 48);
        $this->pdf->Line(10, 40, 10, 48);
        $this->pdf->Line(200, 40, 200, 48);
        $this->pdf->Line(105, 40, 105, 48);
        // Fin del Primer Cuadro
        
        // Datos del primer cuadro
        $this->pdf->SetXY(25, 44);
        $this->pdf->Cell(0, 0, "Orden de Trabajo");
        $this->pdf->SetXY(75, 44);
        $this->pdf->Cell(0, 0, $ot['numero_ot']);
        $this->pdf->SetXY(110, 44);
        $this->pdf->Cell(0, 0, 'Numero de Pedido');
        //  FALTA PONER EL PEDIDO
        // Fin de datos del primer cuadro
        
        // Segundo cuadro
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Line(10, 52, 200, 52);
        $this->pdf->Line(10, 60, 200, 60);
        $this->pdf->Line(10, 52, 10, 60);
        $this->pdf->Line(200, 52, 200, 60);
        $this->pdf->Line(105, 52, 105, 60);
        // Fin del Segundo Cuadro
        
        // Datos del segundo cuadro
        $this->pdf->SetXY(15, 56);
        $this->pdf->Cell(0, 0, "Plano #");
        $this->pdf->SetXY(35, 56);
        $this->pdf->Cell(0, 0, $ot['numero_ot']);
        $this->pdf->SetXY(110, 44);
        $this->pdf->Cell(0, 0, 'Numero de Pedido');
        //  FALTA PONER EL PEDIDO
        // Fin de datos del segundo cuadro
        
        $this->pdf->Output('Orden de Trabajo '.$ot['numero_ot'], 'I');
    }
    
    public function padron() {
        $this->load->model(array(
            'padron_model'
        ));
        
        $this->padron_model->conectar();
        $this->padron_model->limpiar_base();
        
        $fp = fopen(base_url()."upload/Padron.txt", "r");
        $inicio = time();
        while(!feof($fp)) {
            $linea = fgets($fp);
            $explode = explode(";", $linea);
            $datos = array(
                'emision' => $explode[1],
                'desde' => $explode[2],
                'hasta' => $explode[3],
                'cuit' => $explode[4],
                'porcentaje' => str_replace(",", ".", $explode[8])
            );
            $id = $this->padron_model->set($datos);
            $tiempo = time();
            if(($id%10000) == 0) {
                var_dump($tiempo-$inicio);
            }
        }
        fclose($fp);
        
    }
    
    public function ajax() {
        $this->load->view("prueba/ajax");
    }
    
    
    public function alela() {
        $this->load->model(array(
            'articulos_model'
        ));
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Artículos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['articulos'] = $this->articulos_model->gets();
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('prueba/alela');
        $this->load->view('layout_alela/footer');
    }
    
    public function pedidos() {
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
            'clientes_model',
            'monedas_model',
            'pedidos_model',
            'provincias_model',
            'log_model',
            'articulos_model',
            'productos_model',
            'ots_model'
        ));
        
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Pedidos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['pedidos'] = $this->pedidos_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('prueba/pedidos');
        $this->load->view('layout_lte/footer');
    }
    
    public function ots() {
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
            'clientes_model',
            'monedas_model',
            'pedidos_model',
            'provincias_model',
            'log_model',
            'articulos_model',
            'productos_model',
            'ots_model'
        ));
        
        $session = $this->session->all_userdata();
        
        $this->r_session->check($session);
        $data['title'] = 'Listar Pedidos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['ots'] = $this->ots_model->gets();
        
        $this->load->view('layout_alela/header', $data);
        $this->load->view('layout_alela/menu');
        $this->load->view('prueba/ots');
        $this->load->view('layout_alela/footer');
    }
    
    public function post() {
        var_dump($this->input->post());
    }
    
    public function alertify() {
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
            'clientes_model',
            'monedas_model',
            'pedidos_model',
            'provincias_model',
            'prueba_model',
            'log_model',
            'articulos_model',
            'productos_model',
            'ots_model'
        ));
        
        $session = $this->session->all_userdata();
        $data['title'] = 'CK EDITOR';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        
        
        
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('prueba/alertify');
        $this->load->view('layout_lte/footer');
    }
    
    public function upload_file() {
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
            'clientes_model',
            'monedas_model',
            'pedidos_model',
            'provincias_model',
            'prueba_model',
            'log_model',
            'articulos_model',
            'productos_model',
            'ots_model'
        ));
        
        $session = $this->session->all_userdata();
        $data['title'] = 'CK EDITOR';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        
        
        
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('prueba/upload_file');
        $this->load->view('layout_lte/footer');
    }
    
    public function datatable() {
        $this->load->model(array(
            'ots_model'
        ));
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Órdenes de Trabajo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        //$data['ots'] = $this->ots_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('prueba/datatable');
        $this->load->view('layout_lte/footer');
    
    }
    
    public function datatable_ajax() {
        $this->load->view('prueba/datatable_ajax');
    }
    
    public function prueba_ajax() {
        $this->load->model(array(
            'ots_model',
            'numeros_serie_model'
        ));
        $data['data'] = $this->ots_model->gets();
        foreach ($data['data'] as $key => $value) {
            $data['data'][$key]['numeros_serie'] = $this->numeros_serie_model->gets_por_ot($value['idot']);
        } 
        echo json_encode($data);
    }
    
    public function modal() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Órdenes de Trabajo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        //$data['ots'] = $this->ots_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('prueba/modal');
        $this->load->view('layout_lte/footer');
    }
}
?>