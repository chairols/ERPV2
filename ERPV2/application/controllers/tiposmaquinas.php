<?php

class Tiposmaquinas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'tipos_maquinas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Tipos de Máquinas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['tiposmaquinas'] = $this->tipos_maquinas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('tiposmaquinas/index');
        $this->load->view('tiposmaquinas/script.php');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Tipo de Máquina';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('tiposmaquinas/agregar');
        $this->load->view('tiposmaquinas/script.php');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar_post() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        if($this->input->post('tipomaquina') == '') {
            echo "3";  // Debe ingresar un valor
        } else {
            $datos = array(
                'tipo_maquina' => $this->input->post('tipomaquina')
            );

            $resultado = $this->tipos_maquinas_model->get_where($datos);

            if(count($resultado) == 0) {
                $id = $this->tipos_maquinas_model->set($datos);
                if($id > 0) {
                    echo "0";  // Se agregó correctamente
                } else {
                    echo "2";  // No se pudo agregar
                }
            } else {
                echo "1";  //  1 Existe
            }
        }
    }
}
?>