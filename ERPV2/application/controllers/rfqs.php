<?php

class Rfqs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'rfqs_model',
            'ots_model',
            'articulos_model',
            'materiales_model',
            'fabricas_model',
            'log_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = "Listar RFQ's";
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['rfqs'] = $this->rfqs_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('rfqs/index');
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['title'] = 'Agregar RFQ';
        
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'cantidad' => $this->input->post('cantidad'),
                'idarticulo' => $this->input->post('articulo'),
                'idmaterial' => $this->input->post('material'),
                'idfabrica' => $this->input->post('destino'),
                'observaciones' => $this->input->post('observaciones')
            );
            if($this->input->post('checkbox') == 'on') {
                $datos['idot'] = $this->input->post('ot');
            } else {
                $datos['idot'] = null;
            }
            
            $id = $this->rfqs_model->set($datos);
            
            $log = array(
                'tabla' => 'rfqs',
                'idtabla' => $id,
                'texto' => 'Se agregó la RFQ<br>'
                . 'ID Orden de Trabajo: '.$datos['idot'].'<br>'
                . 'Cantidad: '.$datos['cantidad'].'<br>'
                . 'ID Artículo: '.$datos['idarticulo'].'<br>'
                . 'ID Material: '.$datos['idmaterial'].'<br>'
                . 'ID Fabrica/Destino: '.$datos['idfabrica'].'<br>'
                . 'Observaciones: '.$datos['observaciones'],
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
            
            redirect('/rfqs/', 'refresh');

        }
        
        $data['ots'] = $this->ots_model->gets();
        $data['articulos'] = $this->articulos_model->gets();
        $data['materiales'] = $this->materiales_model->gets();
        $data['fabricas'] = $this->fabricas_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('rfqs/agregar');
        $this->load->view('layout/footer');
    }
    
}

?>