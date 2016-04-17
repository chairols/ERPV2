<?php

class Ocs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $desathis->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'pdf_oc'
        ));
        $this->load->model(array(
            'proveedores_model',
            'monedas_model',
            'ocs_model',
            'log_model',
            'articulos_model',
            'medidas_model',
            'ots_model',
            'productos_model',
            'provincias_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Órdenes de Compra';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['ocs'] = $this->ocs_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('ocs/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Orden de Compra';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
        $this->form_validation->set_rules('moneda', 'Moneda', 'required');
        
        if($this->form_validation->run() == FALSE) {
             
        } else {
            $datos = array(
                'idproveedor' => $this->input->post('proveedor'),
                'idmoneda' => $this->input->post('moneda')
            );
            
            $idoc = $this->ocs_model->set($datos);
            
            $proveedor = $this->proveedores_model->get_where(array('idproveedor' => $this->input->post('proveedor')));
            $moneda = $this->monedas_model->get_where(array('idmoneda' => $this->input->post('moneda')));
            
            $log = array(
                'tabla' => 'ocs',
                'idtabla' => $idoc,
                'texto' => 'Se agregó: <br>'
                 . 'Proveedor: '.$proveedor['proveedor'].'<br>'
                 . 'Moneda: '.$moneda['moneda'].'<br>',
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
                
            redirect('/ocs/agregar_items/'.$idoc.'/', 'refresh');
         }
        
        $data['proveedores'] = $this->proveedores_model->gets();
        $data['monedas'] = $this->monedas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('ocs/agregar');
        $this->load->view('layout/footer');
    }
    
    public function agregar_items($idoc) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Orden de Compra';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('medida', 'Medida', 'required|integer');
        $this->form_validation->set_rules('articulo', 'Artículo', 'required|integer');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        //$this->form_validation->set_rules('ot', 'Orden de Compra', 'required|integer');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idoc' => $idoc,
                'cantidad' => $this->input->post('cantidad'),
                'idmedida' => $this->input->post('medida'),
                'idarticulo' => $this->input->post('articulo'),
                'precio' => $this->input->post('precio')
            );
            /*if($this->input->post('ot') == '0') {
                $datos['idot'] = null;
            } else {
                $datos['idot'] = $this->input->post('ot');
            }*/
            
            $iditem = $this->ocs_model->set_item($datos);
            
            $medida = $this->medidas_model->get_where(array('idmedida' => $this->input->post('medida')));
            $articulo = $this->articulos_model->get_where(array('idarticulo' => $this->input->post('articulo')));
            $producto = $this->productos_model->get_where(array('idproducto' => $articulo['idproducto']));
            /*if($datos['idot'])
                $ot = $this->ots_model->get_where(array('idot' => $this->input->post('ot')));
             * 
             */
             
            /*
             * 
             *  FALTA DESARROLLAR LOG
             * 
             */
            
        }
        
        $data['oc'] = $this->ocs_model->get_where(array('idoc' => $idoc));
        $data['proveedor'] = $this->proveedores_model->get_where(array('idproveedor' => $data['oc']['idproveedor']));
        $data['moneda'] = $this->monedas_model->get_where(array('idmoneda' => $data['oc']['idmoneda']));
        $data['medidas'] = $this->medidas_model->gets();
        $data['articulos'] = $this->articulos_model->gets();
        //$data['ots'] = $this->ots_model->gets();
        $data['ocs_items'] = $this->ocs_model->gets_items($idoc);
         
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('ocs/agregar_items');
        $this->load->view('layout/footer');
    }
    
    public function borrar_item($idoc_item) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $datos = array(
            'idoc_item' => $idoc_item
        );
        $data['item'] = $this->ocs_model->get_item_where($datos);
        
        $datos = array(
            'activo' => 0
        );
        $this->ocs_model->update_item($datos, $idoc_item);
        
        redirect('/ocs/agregar_items/'.$data['item']['idoc'].'/', 'refresh');
        
    }
    
    public function pdf($idoc = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idoc == null) {
            redirect('/ocs/', 'refresh');
        }
        
        $oc = $this->ocs_model->get_where(array('idoc' => $idoc));
        $proveedor = $this->proveedores_model->get_where(array('idproveedor' => $oc['idproveedor']));
        $moneda = $this->monedas_model->get_where(array('idmoneda' => $oc['idmoneda']));
        $provincia = $this->provincias_model->get_where(array('idprovincia' => $proveedor['idprovincia']));
        $items = $this->ocs_model->gets_items($idoc);
       
        $this->pdf = new Pdf_oc();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        
        /*
         *  Inicio Complemento de Encabezado
         */
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetXY(150, 10);
        $this->pdf->Cell(0, 0, utf8_decode('Número: '.$oc['idoc']));
        
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetXY(150, 16);
        $this->pdf->Cell(0, 0, 'Fecha: '.  date('d/m/Y', strtotime($oc['timestamp'])));
        
        $this->pdf->SetXY(150, 22);
        $this->pdf->Cell(0, 0, 'ORIGINAL');
        /*
         *  Fin Complemento de Encabezado
         */
        
        
        /*
         *  Inicio Encabezado Datos de Proveedor
         */
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(12, 57);
        $this->pdf->Cell(0, 0, utf8_decode('Señor/es: '));
        
        $this->pdf->SetXY(28, 57);
        $this->pdf->Cell(0, 0, utf8_decode($proveedor['proveedor'].' ('.$proveedor['idproveedor'].')'));
        
        $this->pdf->SetXY(28, 61);
        $this->pdf->Cell(0, 0, utf8_decode($proveedor['domicilio'].' - '.$proveedor['localidad'].' - '.$provincia['provincia']));
        
        $this->pdf->SetXY(12, 65);
        $this->pdf->Cell(0, 0, utf8_decode('Teléfono:'));
        $this->pdf->SetXY(28, 65);
        $this->pdf->Cell(0, 0, utf8_decode($proveedor['telefono']));
        
        $this->pdf->SetXY(12, 69);
        $this->pdf->Cell(0, 0, 'Contacto:');
        $this->pdf->SetXY(28, 69);
        $this->pdf->Cell(0, 0, utf8_decode($proveedor['contacto']));
        
        $this->pdf->SetXY(12, 73);
        $this->pdf->Cell(0, 0, 'Correo: ');
        $this->pdf->SetXY(28, 73);
        $this->pdf->Cell(0, 0, utf8_decode($proveedor['correo']));
        
        //$this->pdf->Line(10, 77, 200, 77);
        /*
         *  Fin Encabezado Datos de Proveedor
         */
        
        
        /*
         *  Comienzo Encabezado de Listado de Artículos
         */
        $this->pdf->SetFont('Arial', 'B', '8');
        $this->pdf->SetXY(10, 77);
        $this->pdf->Cell(16, 6, 'Cantidad', 1, 0, 'C');
        
        //$this->pdf->SetXY(28, 80);
        $this->pdf->Cell(14, 6, 'U.M.', 1, 0, 'C');
        
        //$this->pdf->SetXY(40, 80);
        $this->pdf->Cell(100, 6, utf8_decode('Artículo - Descripción'), 1, 0, 'C');
        
        $this->pdf->Cell(30, 6, 'Precio Unitario', 1, 0, 'C');
        $this->pdf->Cell(30, 6, 'Precio Total', 1, 0, 'C');
        
        //$this->pdf->Line(10, 83, 200, 83);
        /*
         *  Fin Encabezado de Listado de Artículos
         */
        $this->pdf->Ln(6);
        
        $this->pdf->SetFont('Arial', '', 8);
        $subtotal = 0;
        foreach($items as $item) {
            $this->pdf->Cell(16, 6, $item['cantidad'], 0, 0, 'R');
            $this->pdf->Cell(14, 6, $item['medida_corta'], 0, 0, 'C');
            $this->pdf->Cell(100, 6, utf8_decode($item['producto'].' '.$item['articulo']), 0, 0, 'L');
            $this->pdf->Cell(30, 6, $moneda['simbolo'].' '.$item['precio'], 0, 0, 'R');
            $this->pdf->Cell(30, 6, $moneda['simbolo'].' '.number_format($item['precio']*$item['cantidad'], 2), 0, 0, 'R');
            $subtotal+=$item['cantidad']*$item['precio'];
            $this->pdf->Ln(5);
        }
        
        
        $this->pdf->Ln(10);
        $this->pdf->Cell(190, 6, 'MONEDA: '.$moneda['moneda'], 1, 0, 'L');
        $this->pdf->Ln();
        $this->pdf->Cell(65, 6, 'SUBTOTAL:', 1, 0, 'L');
        $this->pdf->Cell(60, 6, 'IVA:', 1, 0, 'L');
        $this->pdf->Cell(65, 6, 'TOTAL', 1, 0, 'L');
        $this->pdf->SetX(10);
        $this->pdf->Cell(65, 6, $moneda['simbolo'].' '.number_format($subtotal, 2), 0, 0, 'R');
        $this->pdf->Cell(60, 6, $moneda['simbolo'].' '.number_format($subtotal*0.21, 2), 0, 0, 'R');
        $this->pdf->Cell(65, 6, $moneda['simbolo'].' '.number_format($subtotal*1.21, 2), 0, 0, 'R');
        
        
        
        
        $this->pdf->Output('Orden de Compra '.$idoc.'.pdf', 'I');
        
        var_dump($oc);
        var_dump($proveedor);
        var_dump($moneda);
        var_dump($provincia);
        var_dump($items);
    }
    
    public function editar_item($idoc_item = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Editar Item de Orden de Compra';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required');
        $this->form_validation->set_rules('medida', 'Unidad de Medida', 'required');
        $this->form_validation->set_rules('articulo', 'Articulo', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        
        if($this->form_validation->run() == FALSE) {
             
        } else {
            $datos = array(
                'cantidad' => $this->input->post('cantidad'),
                'idmedida' => $this->input->post('medida'),
                'idarticulo' => $this->input->post('articulo'),
                'precio' => $this->input->post('precio')
            );
            
            $this->ocs_model->update_item($datos, $idoc_item);
            
            $datos = array(
                'idoc_item' => $idoc_item
            );
            $data['item'] = $this->ocs_model->get_item_where($datos);
            
            redirect('/ocs/agregar_items/'.$data['item']['idoc'].'/', 'refresh');
        }
        
        $data['item'] = $this->ocs_model->get_item_where(array('idoc_item' => $idoc_item));
        $data['medidas'] = $this->medidas_model->gets();
        $data['articulos'] = $this->articulos_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('ocs/editar_item');
        $this->load->view('layout/footer');
    }
    
    public function asociar_ot($idoc_item = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Asociar Orden de Compra';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('ot', 'Orden de Trabajo', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idoc_item' => $idoc_item,
                'idot' => $this->input->post('ot')
            );
            
            $resultado = $this->ocs_model->get_asociar_ot_where($datos);
            if(!$resultado) {
                $this->ocs_model->asociar_ot($datos);
            }
        }
        
        $data['item'] = $this->ocs_model->get_item_where(array('idoc_item' => $idoc_item));
        $data['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $data['item']['idarticulo']));
        $data['producto'] = $this->productos_model->get_where(array('idproducto' => $data['articulo']['idproducto']));
        $data['ots'] = $this->ots_model->gets();
        $data['ots_asociadas'] = $this->ocs_model->gets_ots_asociadas($idoc_item);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('ocs/asociar_ot');
        $this->load->view('layout/footer');
    }
    
    public function desasociar_ot($idoc_item = null, $idot = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $datos = array(
            'idoc_item' => $idoc_item,
            'idot' => $idot
        );
        $this->ocs_model->desasociar_ot($datos);
        
        redirect('/ocs/asociar_ot/'.$idoc_item.'/', 'refresh');
    }
}
?>