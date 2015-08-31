<?php

class Ocs extends CI_Controller {
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
            'ocs_model',
            'log_model',
            'articulos_model',
            'medidas_model',
            'ots_model',
            'productos_model'
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
        $this->form_validation->set_rules('ot', 'Orden de Compra', 'required|integer');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idoc' => $idoc,
                'cantidad' => $this->input->post('cantidad'),
                'idmedida' => $this->input->post('medida'),
                'idarticulo' => $this->input->post('articulo'),
                'precio' => $this->input->post('precio')
            );
            if($this->input->post('ot') == '0') {
                $datos['idot'] = null;
            } else {
                $datos['idot'] = $this->input->post('ot');
            }
            
            $iditem = $this->ocs_model->set_item($datos);
            
            $medida = $this->medidas_model->get_where(array('idmedida' => $this->input->post('medida')));
            $articulo = $this->articulos_model->get_where(array('idarticulo' => $this->input->post('articulo')));
            $producto = $this->productos_model->get_where(array('idproducto' => $articulo['idproducto']));
            if($datos['idot'])
                $ot = $this->ots_model->get_where(array('idot' => $this->input->post('ot')));
             
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
        $data['ots'] = $this->ots_model->gets();
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
}
?>