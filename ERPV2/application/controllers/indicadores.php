<?php

class Indicadores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'beans'
        ));
        $this->load->model(array(
            'proveedores_model',
            'ocs_model',
            'monedas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
           
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function entregas() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Entregas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
                
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required|integer');
        $this->form_validation->set_rules('desde', 'Fecha Desde', 'required');
        $this->form_validation->set_rules('hasta', 'Fecha Hasta', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $data['desde'] = $this->input->post('desde');
            $data['hasta'] = $this->input->post('hasta');
            
            $data['ocs'] = $this->ocs_model->gets_ocs_por_fechas_y_proveedor($this->input->post('desde'), $this->input->post('hasta'), $this->input->post('proveedor'));
            
            $data['cumplidas'] = 0;
            $data['cumplidas_vencidas'] = 0;
            $data['pendientes'] = 0;
            $data['pendientes_vencidas'] = 0;
            
            $data['p'] = new ProveedoresBean();
            $data['p']->setId($this->input->post('proveedor'));
            $data['p']->armarProveedorPorID();
            
            foreach($data['ocs'] as $oc) {
                $oc['fecha_recepcionado'] = substr($oc['fecha_recepcionado'], 0, 10);
                
                if($oc['cantidad_pedida'] == $oc['cantidad_recepcionada']) {
                    if($oc['fecha_prometida'] <= $oc['fecha_recepcionado']) {
                        $data['cumplidas']++;
                    } else {
                        $data['cumplidas_vencidas']++;
                    }
                }
                
                if($oc['cantidad_recepcionada'] < $oc['cantidad_pedida'] || is_null($oc['cantidad_recepcionada'])) {
                    if(strtotime($oc['fecha_prometida']) <= strtotime(date('Y-m-d'))) {
                        $data['pendientes_vencidas']++;
                    } else {
                        $data['pendientes']++;
                    }
                }
                
            }
        }
        
        $data['proveedores'] = $this->proveedores_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('indicadores/entregas');
        $this->load->view('layout_lte/footer');
    }
    
    public function compras() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Compras por Proveedor';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
                
        $this->form_validation->set_rules('desde', 'Fecha Desde', 'required');
        $this->form_validation->set_rules('hasta', 'Fecha Hasta', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $data['monedas'] = $this->monedas_model->gets();
            
            foreach($data['monedas'] as $key => $value) {
                $data['monedas'][$key]['ocs'] = $this->ocs_model->gets_ocs_por_fechas_y_moneda($this->input->post('desde'), date('Y-m-d', strtotime($this->input->post('hasta').' + 1 days')), $value['idmoneda']);
                foreach ($data['monedas'][$key]['ocs'] as $k => $v) {
                    $data['monedas'][$key]['ocs'][$k]['rgb'] = $this->generarColorRandom();
                    $data['monedas'][$key]['ocs'][$k]['rgb2'] = $this->generarColorRandom();
                }
            }
            
            $data['desde'] = $this->input->post('desde');
            $data['hasta'] = $this->input->post('hasta');
            
        }
        
        //$data['ocs'] = $this->ocs_model->gets_ocs_por_fechas('1970-01-01', '2018-01-01');
        
        
        $data['proveedores'] = $this->proveedores_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('indicadores/compras');
        $this->load->view('layout_lte/footer');
    }
    
    private function generarColorRandom() {
        $r = rand(128,255); 
        $g = rand(128,255); 
        $b = rand(128,255); 
        $color = dechex($r) . dechex($g) . dechex($b);
        return "#".$color;
    }
    
}
?>