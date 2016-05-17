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
            'almacenes_model',
            'articulos_model',
            'productos_model',
            'marcas_model',
            'medidas_model',
            'log_model',
            'stock_model'
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
        
        $data['stock'] = $this->stock_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('articulo', 'Articulo', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required');
        $this->form_validation->set_rules('medida', 'Unidad de Medida', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idarticulo' => $this->input->post('articulo'),
                'idmarca' => $this->input->post('marca')
            );
            $resultado = $this->stock_model->get_where($datos);
            
            $idstock = null;
            
            if(count($resultado) == 0) {
                $datos = array(
                    'idmedida' => $this->input->post('medida'),
                    'idmarca' => $this->input->post('marca'),
                    'idarticulo' => $this->input->post('articulo'),
                    'url' => $this->input->post('url'),
                    'observaciones' => $this->input->post('observaciones')
                );
                
                $idstock = $this->stock_model->set($datos);
                
                $articulo = $this->articulos_model->get_where(array('idarticulo' => $this->input->post('articulo')));
                $marca = $this->marcas_model->get_where(array('idmarca' => $this->input->post('marca')));
                $medida = $this->medidas_model->get_where(array('idmedida' => $this->input->post('medida')));
                $producto = $this->productos_model->get_where(array('idproducto' => $articulo['idproducto']));
                
                $log = array(
                   'tabla' => 'stock',
                   'idtabla' => $idstock,
                   'texto' => 'Se agregó el stock de <br>'.
                   'Articulo: '.$producto['producto'].' '.$articulo['articulo']."<br>".
                   'Marca: '.$marca['marca']."<br>".
                   'Unidad de Medida: '.$medida['medida_larga']."<br>".
                   'URL: '.$this->input->post('url')."<br>".
                   'Observaciones: '.$this->input->post('observaciones'),
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               
            } else {
                $idstock = $resultado['idstock'];
            }
            
            redirect('/stock/almacenes/'.$idstock.'/', 'refresh');
        }
        
        $data['articulos'] = $this->articulos_model->gets();
        $data['marcas'] = $this->marcas_model->gets();
        $data['medidas'] = $this->medidas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/agregar');
        $this->load->view('layout/footer');
    }
    
    public function modificar($idstock = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idstock == null) {
            redirect('/stock/', 'refresh');
        }
        $data['title'] = 'Modificar Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('ubicacion', 'Ubicacion', 'required');
        $this->form_validation->set_rules('almacen', 'Almacen', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'cantidad' => $this->input->post('cantidad'),
                'ubicacion' => $this->input->post('ubicacion'),
                'idstock' => $this->input->post('idstock'),
                'idalmacen' => $this->input->post('almacen'),
                'observaciones' => $this->input->post('observaciones')
            );
            
            $id = $this->stock_model->set_stock_almacen($datos);
            
            
        }
        
        /*
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
        */
        
        $data['stock'] = $this->stock_model->get_where(array('idstock' => $idstock));
        $data['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $data['stock']['idarticulo']));
        $data['producto'] = $this->productos_model->get_where(array('idproducto' => $data['articulo']['idproducto']));
        $data['medida'] = $this->medidas_model->get_where(array('idmedida' => $data['stock']['idmedida']));
        
        $data['almacenes'] = $this->almacenes_model->gets();
        
        $data['stock_existente'] = $this->stock_model->gets_stock_existente($idstock);
        
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
    
    public function ingresar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Ingresar Stock';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['articulos'] = $this->articulos_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/ingresar');
        $this->load->view('layout/footer');
    }
    
    public function almacenes($idstock = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idstock == null) {
            redirect('/stock/', 'refresh');
        }
        $data['title'] = 'Stock Almacenes';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('almacen', 'Almacén', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idstock' => $idstock,
                'idalmacen' => $this->input->post('almacen')
            );
            $resultado = $this->stock_model->get_where_stock_almacenes($datos);
            
            if(!count($resultado)) {
                $datos = array(
                    'idstock' => $idstock,
                    'idalmacen' => $this->input->post('almacen')
                );
                $id = $this->stock_model->set_stock_almacen($datos);
                
            } 
        }
        
        
        $datos = array(
            'idstock' => $idstock
        );
        $data['stock'] = $this->stock_model->get_where($datos);
        $data['stock']['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $data['stock']['idarticulo']));
        $data['stock']['producto'] = $this->productos_model->get_where(array('idproducto' => $data['stock']['articulo']['idproducto']));
        $data['stock']['marca'] = $this->marcas_model->get_where(array('idmarca' => $data['stock']['idmarca']));
        $data['stock']['medida'] = $this->medidas_model->get_where(array('idmedida' => $data['stock']['idmedida']));
        $data['almacenes'] = $this->almacenes_model->gets();
        $data['stock_almacenes'] = $this->stock_model->gets_stock_almacenes_por_stock($idstock);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/almacenes');
        $this->load->view('layout/footer');
    }
    
    public function editar($idstock_almacen = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idstock_almacen == null) {
            redirect('/stock/', 'refresh');
        }
        $data['title'] = 'Modificar Stock Almacén';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'cantidad' => $this->input->post('cantidad'),
                'ubicacion' => $this->input->post('ubicacion'),
                'observaciones' => $this->input->post('observaciones')
            );
            
            $this->stock_model->update_stock_almacen($datos, $idstock_almacen);
            
            $datos = array(
                'idstock_almacen' => $idstock_almacen
            );
            $data['stock_almacen'] = $this->stock_model->get_where_stock_almacenes($datos);
            
            redirect('/stock/almacenes/'.$data['stock_almacen']['idstock'].'/', 'refresh');
        }
        
        $datos = array(
            'idstock_almacen' => $idstock_almacen
        );
        $data['stock_almacen'] = $this->stock_model->get_where_stock_almacenes($datos);
        $data['stock_almacen']['almacen'] = $this->almacenes_model->get_where(array('idalmacen' => $data['stock_almacen']['idalmacen']));
        $data['stock'] = $this->stock_model->get_where(array('idstock' => $data['stock_almacen']['idstock']));
        $data['stock']['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $data['stock']['idarticulo']));
        $data['stock']['producto'] = $this->productos_model->get_where(array('idproducto' => $data['stock']['articulo']['idproducto']));
        $data['stock']['marca'] = $this->marcas_model->get_where(array('idmarca' => $data['stock']['idmarca']));
        $data['stock']['medida'] = $this->medidas_model->get_where(array('idmedida' => $data['stock']['idmedida']));
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('stock/editar');
        $this->load->view('layout/footer');
    }
}
?>