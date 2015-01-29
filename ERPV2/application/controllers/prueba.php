<?php

class Prueba extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation'
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
}
?>