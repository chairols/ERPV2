<?php

class Hojasdeproceso extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation'
        ));
        $this->load->model(array(
            'hojasdeproceso_model',
            'log_model',
            'articulos_model',
            'usuarios_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Hojas de Proceso';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['procesos'] = $this->hojasdeproceso_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('hojasdeproceso/index', $data);
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Agregar Hoja de Proceso';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('hojadeproceso', 'Hoja de Proceso', 'required');
        $this->form_validation->set_rules('editable', 'Archivo Editable', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            
        }
        
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('hojasdeproceso/agregar', $data);
        $this->load->view('hojasdeproceso/script_agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar_post() {
        $session = $this->session->all_userdata();
        $this->form_validation->set_rules('id', 'Número de Hoja de Proceso', 'required|integer');
        $this->form_validation->set_rules('hojadeproceso', 'Nombre de la Hoja de Proceso', 'required');
        
        if($this->form_validation->run() == FALSE) {
            $json = array(
                'status' => 'error',
                'data' => validation_errors()
            );
            echo json_encode($json);
        } else {
            $datos = array(
                'hojadeproceso' => $this->input->post('hojadeproceso')
            );
            
            $id = $this->hojasdeproceso_model->set($datos);
            
            $log = array(
                'tabla' => 'hojasdeproceso',
                'idtabla' => $id,
                'texto' => 'Se agregó la hoja de proceso <br> '
                . 'Nombre: '.$this->input->post('hojadeproceso'),
                'tipo' => 'add',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);
            
            if($id > 0) {
                $json = array(
                    'status' => 'ok',
                    'id' => $id
                );
                echo json_encode($json);
            } else {
                $json = array(
                    'status' => 'error',
                    'data' => 'No se pudo agregar'
                );
                echo json_encode($json);
            }
            
        }
    }
    
    public function proximoid() {
        $data['ultimoid'] = $this->hojasdeproceso_model->get_ultimo_id();
        
        if($data['ultimoid']['id'] == null) {
            $data['proximoid'] = 1;
        } else {
            $data['proximoid'] = $data['ultimoid']['id'] + 1;
        }
        
        $this->load->view('hojasdeproceso/proximoid', $data);
    }
    
    public function modificar($idhojadeproceso = NULL) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idhojadeproceso == null) {
            redirect('/hojasdeproceso/', 'refresh');
        }
        $data['title'] = 'Modificar Hoja de Proceso';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['idhojadeproceso'] = $idhojadeproceso;
        
        $this->form_validation->set_rules('archivo', 'Archivo', 'required');
        $this->form_validation->set_rules('revision', 'Revision', 'required|numeric');
        $this->form_validation->set_rules('elaboro', 'Elaboró', 'required|numeric');
        $this->form_validation->set_rules('reviso', 'Revisó', 'required|numeric');
        $this->form_validation->set_rules('aprobo', 'Aprobó', 'required');
        $this->form_validation->set_rules('fecha_aprobación', 'Fecha de Aprobación', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            
        }
        
        $data['articulos'] = $this->articulos_model->gets();
        $data['usuarios'] = $this->usuarios_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('hojasdeproceso/modificar');
        $this->load->view('hojasdeproceso/script_modificar');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar_articulo_post() {
        $session = $this->session->all_userdata();
        $this->form_validation->set_rules('articulo', 'Artículo', 'required|integer');
        $this->form_validation->set_rules('hojadeproceso', 'Hoja de Proceso', 'required|integer');
        
        if($this->form_validation->run() == FALSE) {
            $json = array(
                'status' => 'error',
                'data' => validation_errors()
            );
            echo json_encode($json);
        } else {
            $datos = array(
                'idhojadeproceso' => $this->input->post('hojadeproceso'),
                'idarticulo' => $this->input->post('articulo')
            );
            
            $resultado = $this->hojasdeproceso_model->get_where_asociar_articulo($datos);
            
            if($resultado == null) {
                $this->hojasdeproceso_model->asociar_articulo($datos);
            
                $art = array(
                    'idarticulo' => $this->input->post('articulo')
                );
                $articulo = $this->articulos_model->get_where($art);

                $log = array(
                    'tabla' => 'hojasdeproceso',
                    'idtabla' => $datos['idhojadeproceso'],
                    'texto' => 'Se asoció el artículo <br> '
                    . 'Artículo: '.$articulo['articulo'],
                    'tipo' => 'add',
                    'idusuario' => $session['SID']
                );
                $this->log_model->set($log);
                
                $json = array(
                    'status' => 'ok',
                    'id' => $this->input->post('hojadeproceso')
                );
                echo json_encode($json);
            } else {
                $json = array(
                    'status' => 'error',
                    'data' => 'El artículo ya está asociado'
                );
                echo json_encode($json);
            }
        }
    }
    
    public function articulos_asociados($idhojadeproceso = NULL) {
        $session = $this->session->all_userdata();
        if($idhojadeproceso != NULL) {
            $data['articulos'] = $this->hojasdeproceso_model->gets_articulos_asociados($idhojadeproceso);
            
            $this->load->view('hojasdeproceso/articulos_asociados', $data);
        }
    }
    
    public function desasociar_articulo($idhojadeproceso = NULL, $idarticulo = NULL) {
        $session = $this->session->all_userdata();
        if($idhojadeproceso != NULL && $idarticulo != NULL) {
            $datos = array(
                'idhojadeproceso' => $idhojadeproceso,
                'idarticulo' => $idarticulo
            );
            
            $this->hojasdeproceso_model->borrar_articulo($datos);
        }
    }
}
?>