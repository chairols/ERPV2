<?php

class Productos extends CI_Controller {
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
        $this->load->model(array(
            'productos_model',
            'log_model'
        ));
    }
    
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Productos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['productos'] = $this->productos_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('productos/index');
        $this->load->view('layout_lte/footer');   
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Producto';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe la sucursal repetida
        
        $this->form_validation->set_rules('producto', 'Producto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'producto' => $this->input->post('producto')
            );
            $resultado = $this->productos_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'producto' => $this->input->post('producto')
                );

                $id = $this->productos_model->set($datos); 
               
                $log = array(
                    'tabla' => 'productos',
                    'idtabla' => $id,
                    'texto' => 'Se agregó: <br>'
                     . 'producto: '.$this->input->post('producto'),
                    'tipo' => 'add',
                    'idusuario' => $session['SID']
                );
               
                $this->log_model->set($log);
                
                redirect('/productos/', 'refresh');
                
            } else {
                $data['alerta'] = '<div class="alert alert-danger">El producto ya existe</div>';
            }
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('productos/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idproducto = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Modificar Producto';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        if($idproducto == null) {
            redirect('/productos/', 'refresh');
        }
        
        $this->form_validation->set_rules('producto', 'Producto', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'producto' => $this->input->post('producto')
            );
            
            $this->productos_model->update($datos, $idproducto);
            
            $log = array(
                'tabla' => 'productos',
                'idtabla' => $idproducto,
                'texto' => 'Se modificó: <br>'
                 . 'producto: '.$this->input->post('producto'),
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );

            $this->log_model->set($log);
            
            redirect('/productos/', 'refresh');
        }
        
        $data['producto'] = $this->productos_model->get_where(array('idproducto' => $idproducto));
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('productos/modificar');
        $this->load->view('layout_lte/footer');
    }
}

?>
