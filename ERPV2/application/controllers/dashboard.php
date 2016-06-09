<?php

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->model(array(
            'ots_model',
            'contratos_model'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Dashboard';
        $data['session'] = $session;
        $data['segmento'] = 'dashboard';
        
        $data['ots_pendientes'] = $this->ots_model->gets_where(array('fecha_terminado' => null, 'activo' => '1'));
        $data['ots_cumplidas'] = $this->ots_model->gets_cumplidas();
        $data['ots_vencidas'] = $this->ots_model->gets_vencidas();
        $data['contratos_vigentes'] = $this->contratos_model->gets_contratos_vigentes();
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }
}

?>