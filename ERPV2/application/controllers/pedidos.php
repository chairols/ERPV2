<?php

class Pedidos extends CI_Controller {
    public function __construct() {
        parent::__construct();
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
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Pedidos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['pedidos'] = $this->pedidos_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('pedidos/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Pedido';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['clientes'] = $this->clientes_model->gets();
        $data['monedas'] = $this->monedas_model->gets();
        
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        $this->form_validation->set_rules('moneda', 'Moneda', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idcliente' => $this->input->post('cliente'),
                'idmoneda' => $this->input->post('moneda'),
                'ordendecompra' => $this->input->post('ordendecompra')
            );
            
            $config['upload_path'] = "./upload/pedidos/";
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = true;
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);
            $adjunto = null;
            
            if(!$this->upload->do_upload('adjunto')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data' => $this->upload->data());
            }
            
            if($adjunto != null) {
                $datos['adjunto'] = '/upload/pedidos/'.$adjunto['upload_data']['file_name'];
            } 
            
            $idpedido = $this->pedidos_model->set($datos);
            
            $cliente = $this->clientes_model->get_where(array('idcliente' => $this->input->post('cliente')));
            $moneda = $this->monedas_model->get_where(array('idmoneda' => $this->input->post('moneda')));
            
            $log = array(
                'tabla' => 'pedidos',
                'idtabla' => $idpedido,
                'texto' => 'Se agregó: <br>'
                 . 'cliente: '.$cliente['cliente'].'<br>'
                 . 'moneda: '.$moneda['moneda'].'<br>'
                 . 'orden de compra: '.$this->input->post('ordendecompra').'<br>'
                 . 'adjunto: /upload/pedidos/'.$adjunto['upload_data']['file_name'],
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
                
            redirect('/pedidos/agregar_items/'.$idpedido.'/', 'refresh');
        }
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('pedidos/agregar');
        $this->load->view('layout/footer_form');
    }
    
    public function agregar_items($idpedido = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Item a Pedido';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        if($idpedido == null) {
            redirect('/pedidos/', 'refresh');
        }
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('articulo', 'Artículo', 'required|numeric');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idpedido' => $idpedido,
                'cantidad' => $this->input->post('cantidad'),
                'idarticulo' => $this->input->post('articulo'),
                'precio' => $this->input->post('precio')
            );
            
            $iditem = $this->pedidos_model->set_item($datos);
            
            $articulo = $this->articulos_model->get_where(array('idarticulo' => $this->input->post('articulo')));
            $producto = $this->productos_model->get_where(array('idproducto' => $articulo['idproducto']));
                
            $log = array(
                'tabla' => 'pedidos',
                'idtabla' => $idpedido,
                   'texto' => 'Se agregó: <br>'
                 . 'cantidad: '.$this->input->post('cantidad').'<br>'
                 . 'articulo: '.$producto['producto'].' '.$articulo['articulo'].'<br>'
                 . 'precio: '.number_format($this->input->post('precio'), 2),
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
        }
        
        $data['pedido'] = $this->pedidos_model->get_where(array('idpedido' => $idpedido));
        $data['cliente'] = $this->clientes_model->get_where(array('idcliente' => $data['pedido']['idcliente']));
        $data['cliente']['provincia'] = $this->provincias_model->get_where(array('idprovincia' => $data['cliente']['idprovincia']));
        $data['pedido']['moneda'] = $this->monedas_model->get_where(array('idmoneda' => $data['pedido']['idmoneda']));
        $data['articulos'] = $this->articulos_model->gets();
        $data['pedido_items'] = $this->pedidos_model->gets_items($idpedido);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('pedidos/agregar_items');
        $this->load->view('layout/footer');
    }
    
    public function borrar_item($idpedido_item = null) {
        if(is_integer($idpedido_item)) {
            
        } else {
            
        }
    }
    
    public function asociar_ot($idpedido_item) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Asociar Orden de Trabajo a Pedido';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $this->form_validation->set_rules('ot', 'Orden de Trabajo', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idpedido_item' => $idpedido_item,
                'idot' => $this->input->post('ot')
            );
            
            $resultado = $this->pedidos_model->get_asociar_ot_where($datos);
            if(!$resultado) {
                $this->pedidos_model->asociar_ot($datos);
            }
        }
        
        $data['item'] = $this->pedidos_model->get_item_where($idpedido_item);
        $data['ots'] = $this->ots_model->gets();
        $data['ots_asociadas'] = $this->pedidos_model->gets_ots_asociadas($idpedido_item);
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('pedidos/asociar_ot');
        $this->load->view('layout/footer');
    }
    
    public function desasociar_ot($idpedido_item = null, $idot = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        $datos = array(
            'idpedido_item' => $idpedido_item,
            'idot' => $idot
        );
        $this->pedidos_model->desasociar_ot($datos);
        
        redirect('/pedidos/asociar_ot/'.$idpedido_item.'/', 'refresh');
    }
}

?>