<?php

class Ots extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'pdf_ot',
            'uri'
        ));
        $this->load->model(array(
            'ots_model',
            'articulos_model',
            'productos_model',
            'fabricas_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    /*
     * Terminado
     */
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Órdenes de Trabajo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['ots'] = $this->ots_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('ots/index');
        $this->load->view('layout/footer');
    }
    
    public function ver($idot = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idot == null) {
            redirect('/ots/', 'refresh');
        }
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['alerta'] = '';   //  Se utiliza para cuando la OT ya existe
        
        $data['articulos'] = $this->articulos_model->gets();
        $data['fabricas'] = $this->fabricas_model->gets();
        
        $this->form_validation->set_rules('fabrica', 'Fabrica', 'required|integer');
        $this->form_validation->set_rules('ot', 'Orden de Trabajo', 'required|integer');
        $this->form_validation->set_rules('articulo', 'Articulo', 'required|integer');
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idfabrica' => $this->input->post('fabrica'),
                'numero_ot' => $this->input->post('ot')
            );
            $resultado = $this->ots_model->get_where($datos);
            
            if(count($resultado) == 0) {
                $datos = array(
                    'idfabrica' => $this->input->post('fabrica'),
                    'numero_ot' => $this->input->post('ot'),
                    'cantidad' => $this->input->post('cantidad'),
                    'idarticulo' => $this->input->post('articulo'),
                    'observaciones' => $this->input->post('observaciones'),
                    
                );
                if($this->input->post('fecha_necesidad') == '') {
                    $datos['fecha_necesidad'] = NULL;
                } else {
                    $datos['fecha_necesidad'] = $this->input->post('fecha_necesidad');
                } 
                
                if($this->input->post('fecha_terminado') == '') {
                    $datos['fecha_terminado'] = NULL;
                } else {
                    $datos['fecha_terminado'] = $this->input->post('fecha_terminado');
                } 
                
                if($this->input->post('numero_serie') == '') {
                    $datos['numero_serie'] = NULL;
                } else {
                    $datos['numero_serie'] = $this->input->post('numero_serie');
                } 
                
                if($this->input->post('pedido') == 'null') {
                    $datos['idpedido'] = NULL;
                } else {
                    $datos['idpedido'] = $this->input->post('pedido');
                }
                
                $id = $this->ots_model->set($datos);
                $fabrica = $this->fabricas_model->get_where(array('idfabrica' => $this->input->post('fabrica')));
                
                $log = array(
                   'tabla' => 'ots',
                   'idtabla' => $id,
                   'texto' => 'Se agregó: <br>'
                    . 'fabrica: '.$fabrica['fabrica'].'<br>'
                    . 'Número de Orden de Trabajo: '.$this->input->post('ot').'<br>'
                    . 'Cantidad: '.$this->input->post('cantidad').'<br>'
                    . 'Fecha de Necesidad: '.$this->input->post('fecha_necesidad').'<br>'
                    . 'Fecha de Terminado: '.$this->input->post('fecha_terminado').'<br>'
                    . 'Observaciones: '.$this->input->post('observaciones').'<br>'
                    . 'Número de serie: '.$this->input->post('numero_serie').'<br>'
                    . 'Orden de Compra: '.$this->input->post('ordendecompra'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
                );
                
                $this->log_model->set($log);
                
                redirect('/ots/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">La Orden de Trabajo ya existe</div>';
            }
            
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('ots/agregar');
        $this->load->view('layout/footer_form');
    }
    
    public function modificar($idot = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idot == null) {
            redirect('/ots/', 'refresh');
        }
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets();
        
        
        $data['ot'] = $this->ots_model->get_where(array('idot' => $idot));
        $data['fabrica'] = $this->fabricas_model->get_where(array('idfabrica' => $data['ot']['idfabrica']));

        
        $this->form_validation->set_rules('articulo', 'Articulo', 'required|integer');
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'cantidad' => $this->input->post('cantidad'),
                'idarticulo' => $this->input->post('articulo'),
                'observaciones' => $this->input->post('observaciones'),

            );
            if($this->input->post('fecha_necesidad') == '') {
                $datos['fecha_necesidad'] = NULL;
            } else {
                $datos['fecha_necesidad'] = $this->input->post('fecha_necesidad');
            } 

            if($this->input->post('fecha_terminado') == '') {
                $datos['fecha_terminado'] = NULL;
            } else {
                $datos['fecha_terminado'] = $this->input->post('fecha_terminado');
            } 

            if($this->input->post('numero_serie') == '') {
                $datos['numero_serie'] = NULL;
            } else {
                $datos['numero_serie'] = $this->input->post('numero_serie');
            } 

            if($this->input->post('pedido') == 'null') {
                $datos['idpedido'] = NULL;
            } else {
                $datos['idpedido'] = $this->input->post('pedido');
            }
            
            $this->ots_model->update($datos, $data['ot']['idot']);
            
            $log = array(
               'tabla' => 'ots',
               'idtabla' => $idot,
               'texto' => 'Se modificó: <br>'
                . 'fabrica: '.$data['fabrica']['fabrica'].'<br>'
                . 'Número de Orden de Trabajo: '.$data['ot']['numero_ot'].'<br>'
                . 'Cantidad: '.$this->input->post('cantidad').'<br>'
                . 'Fecha de Necesidad: '.$this->input->post('fecha_necesidad').'<br>'
                . 'Fecha de Terminado: '.$this->input->post('fecha_terminado').'<br>'
                . 'Observaciones: '.$this->input->post('observaciones').'<br>'
                . 'Número de serie: '.$this->input->post('numero_serie').'<br>'
                . 'Pedido: '.$this->input->post('pedido'),
               'tipo' => 'edit',
               'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
            
            redirect('/ots/', 'refresh');
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('ots/modificar');
        $this->load->view('layout/footer_form');
    }
    
    public function ajax_fabricas($idfabrica) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $ultima_ot = $this->ots_model->get_ultima_ot($idfabrica);
        
        echo '<input type="text" maxlength="11" class="form-control" value="';
        if($ultima_ot['ultima_ot'] == null) {
            echo "1";
        } else {
            echo (int)$ultima_ot['ultima_ot'] + 1;
        }
        echo '" name="ot" autofocus>';
    }
    
    private function pdf_anterior($idot = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idot == null) {
            redirect('/ots/', 'refresh');
        }
        $ot = $this->ots_model->get_where(array('idot' => $idot));
        $articulo = $this->articulos_model->get_where(array('idarticulo' => $ot['idarticulo']));
        $producto = $this->productos_model->get_where(array('idproducto' => $articulo['idproducto']));
        
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
        $this->pdf->Cell(0, 0, "Plano");
        $this->pdf->SetXY(40, 56);
        $this->pdf->Cell(0, 0, $articulo['plano']);
        $this->pdf->SetXY(110, 56);
        $this->pdf->Cell(0, 0, 'Revision '.$articulo['revision'].'      Posicion: '.$articulo['posicion']);
        // Fin de datos del segundo cuadro
        
        // Tercer cuadro
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Line(10, 64, 200, 64);
        $this->pdf->Line(10, 72, 200, 72);
        $this->pdf->Line(10, 64, 10, 72);
        $this->pdf->Line(200, 64, 200, 72);
        $this->pdf->Line(60, 64, 60, 72);
        // Fin del Tercer Cuadro
        
        // Datos del tercer cuadro
        $this->pdf->SetXY(15, 68);
        $this->pdf->Cell(0, 0, "Cantidad");
        $this->pdf->SetXY(40, 68);
        $this->pdf->Cell(0, 0, $ot['cantidad']);
        $this->pdf->SetXY(65, 68);
        $this->pdf->Cell(0, 0, 'Producto: '.utf8_decode($producto['producto']).' '.utf8_decode($articulo['articulo']));
        // Fin de datos del tercer cuadro
        
        // Cuarto cuadro
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Line(10, 76, 200, 76);
        $this->pdf->Line(10, 84, 200, 84);
        $this->pdf->Line(10, 76, 10, 84);
        $this->pdf->Line(200, 76, 200, 84);
        $this->pdf->Line(105, 76, 105, 84);
        // Fin del Cuarto Cuadro
        
        // Datos del cuarto cuadro
        $this->pdf->SetXY(15, 80);
        $this->pdf->Cell(0, 0, "Fecha de Pedido");
        $this->pdf->SetXY(60, 80);
        $this->pdf->Cell(0, 0, strftime('%d/%m/%Y', strtotime($ot['timestamp'])));
        $this->pdf->SetXY(110, 80);
        $this->pdf->Cell(0, 0, 'Fecha de Entrega');
        $this->pdf->SetXY(155, 80);
        $fecha_necesidad = '';
        if($ot['fecha_necesidad'] != null) {
            $fecha_necesidad = strftime('%d/%m/%Y', strtotime($ot['fecha_necesidad']));
        }
        $this->pdf->Cell(0, 0, $fecha_necesidad);
        // Fin de datos del cuarto cuadro
        
        $this->pdf->SetXY(10, 100);
        $this->pdf->Cell(0, 0, 'Observaciones');
        $this->pdf->SetXY(10, 106);
        $this->pdf->MultiCell(190, 6, utf8_decode($ot['observaciones']), 1, 1);
        
        $this->pdf->Output('Orden de Trabajo '.$ot['numero_ot'], 'I');
    }
    
    public function pdf($idot = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idot == null) {
            redirect('/ots/', 'refresh');
        }
        $ot = $this->ots_model->get_where(array('idot' => $idot));
        $articulo = $this->articulos_model->get_where(array('idarticulo' => $ot['idarticulo']));
        $producto = $this->productos_model->get_where(array('idproducto' => $articulo['idproducto']));
        $fabrica = $this->fabricas_model->get_where(array('idfabrica' => $ot['idfabrica']));
        
        $this->pdf = new Pdf_ot();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        
        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->SetXY(10, 44);
        
        // Primer cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Fábrica"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, utf8_decode($fabrica['fabrica']), 1, 1);
        $this->pdf->Ln();
        
        // Segundo cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Orden de Trabajo"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, $ot['numero_ot'], 1, 1);
        $this->pdf->Ln();
        
        // Tercer cuadro
        if($ot['idpedido'] != null) {
            $this->pdf->Cell(0, 6, utf8_decode("Número de Pedido"));
            $this->pdf->Ln();
            $this->pdf->MultiCell(0, 6, '', 1, 1);  //  Pendiente de Desarrollar
            $this->pdf->Ln();
        }
        
        // Cuarto cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Plano"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, utf8_decode($articulo['plano']), 1, 1);
        $this->pdf->Ln();
        
        // Quito cuadro
        if($articulo['revision'] != '') {
            $this->pdf->Cell(0, 6, utf8_decode("Revisión"));
            $this->pdf->Ln();
            $this->pdf->MultiCell(0, 6, utf8_decode($articulo['revision']), 1, 1);
            $this->pdf->Ln();
        }
        
        // Sexto cuadro
        if($articulo['posicion'] != '') {
            $this->pdf->Cell(0, 6, utf8_decode("Posición"));
            $this->pdf->Ln();
            $this->pdf->MultiCell(0, 6, utf8_decode($articulo['posicion']), 1, 1);
            $this->pdf->Ln();
        }
        
        // Séptimo cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Cantidad"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, utf8_decode($ot['cantidad']), 1, 1);
        $this->pdf->Ln();
        
        // Octavo cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Producto"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, utf8_decode($producto['producto']), 1, 1);
        $this->pdf->Ln();
        
        // Noveno cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Artículo"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, utf8_decode($articulo['articulo']), 1, 1);
        $this->pdf->Ln();
        
        // Décimo cuadro
        $this->pdf->Cell(0, 6, utf8_decode("Fecha de Pedido"));
        $this->pdf->Ln();
        $this->pdf->MultiCell(0, 6, strftime('%d/%m/%Y', strtotime($ot['timestamp'])), 1, 1);
        $this->pdf->Ln();
        
        // Undécimo cuadro
        if($ot['fecha_necesidad'] != null) {
            $this->pdf->Cell(0, 6, utf8_decode("Fecha de Necesidad"));
            $this->pdf->Ln();
            $this->pdf->MultiCell(0, 6, strftime('%d/%m/%Y', strtotime($ot['fecha_necesidad'])), 1, 1);
            $this->pdf->Ln();
        }
        
        // Duodécimo cuadro
        if($ot['observaciones'] != '') {
            $this->pdf->Cell(0, 6, utf8_decode("Observaciones"));
            $this->pdf->Ln();
            $this->pdf->MultiCell(0, 6, utf8_decode($ot['observaciones']), 1, 1);
            $this->pdf->Ln();
        }
        
        $this->pdf->Output('Orden de Trabajo '.$ot['numero_ot'], 'I');
    }
    
    public function vencidas() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['ots'] = $this->ots_model->gets_vencidas();
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('ots/vencidas');
        $this->load->view('layout/footer_datatable');
    }
    
    public function pendientes() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['ots'] = $this->ots_model->gets_pendientes();
        
        $this->load->view('layout/header_datatable', $data);
        $this->load->view('layout/menu');
        $this->load->view('ots/pendientes');
        $this->load->view('layout/footer_datatable');
    }
    
    public function planilla() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets();
        $articulosoptions = '';
        foreach($data['articulos'] as $articulo) {
            $articulosoptions .= $articulo['idarticulo'];
            $articulosoptions .= ':';
            $articulosoptions .= $articulo['producto'];
            $articulosoptions .= ' ';
            $articulosoptions .= $articulo['articulo'];
            $articulosoptions .= ' ';
            $articulosoptions .= $articulo['plano'];
            $articulosoptions .= ';';
        }
        $data['articulosoptions'] = substr($articulosoptions, 0, strlen($articulosoptions)-1);
        $data['ots'] = $this->ots_model->gets();
       
        $this->load->view('ots/planilla', $data);
        
    }
}

?>