<?php

class Reclamos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'irm_model',
            'reclamos_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Reclamos';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('reclamos/index');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Reclamo';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required|integer');
        $this->form_validation->set_rules('articulos', 'Articulos', 'required');
        $this->form_validation->set_rules('reclamo', 'Reclamo', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idproveedor' => $this->input->post('proveedor'),
                'reclamo' => $this->input->post('reclamo'),
                'idusuario' => $session['SID']
            );
            
            $idreclamo = $this->reclamos_model->set($datos);
            
            foreach($this->input->post('articulos') as $articulo) {
                $datos = array(
                    'idreclamo' => $idreclamo,
                    'idirm_item' => $articulo
                );
                
                $this->reclamos_model->set_item($datos);
            }
        }
        
        $data['proveedores'] = $this->irm_model->gets_proveedores_con_irm_pendientes();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('reclamos/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    
    public function articulos($idproveedor = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idproveedor != 'null') {
            $data['items'] = $this->irm_model->gets_items_pendientes_por_proveedor($idproveedor);
            
            $this->load->view('reclamos/articulos', $data);
        }
    }
}
?>