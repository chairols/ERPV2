<?php

class Numeroserie extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        $this->load->model(array(
            'numeros_serie_model',
            'ots_model',
            'fabricas_model',
            'articulos_model',
            'productos_model',
            'monedas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Números de Serie';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        $data['numeroserie'] = $this->numeros_serie_model->gets();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('numeroserie/index');
        $this->load->view('layout/footer');
    }
    
    public function trazabilidad($numeroserie) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Trazabilidad';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        
        /*
         * Número de Serie
         */
        $data['numeroserie'] = $this->numeros_serie_model->get_where(array('numero_serie' => $numeroserie));
        
        /*
         * Orden de Trabajo
         */
        $data['ot'] = $this->ots_model->get_where(array('idot' => $data['numeroserie']['idot']));
        $data['fabrica'] = $this->fabricas_model->get_where(array('idfabrica' => $data['ot']['idfabrica']));
        $data['articulo'] = $this->articulos_model->get_where(array('idarticulo' => $data['ot']['idarticulo']));
        $data['producto'] = $this->productos_model->get_where(array('idproducto' => $data['articulo']['idproducto']));
        
        /*
         * Pedidos
         */
        $data['pedidos'] = $this->ots_model->gets_pedidos_asociados($data['numeroserie']['idot']);
        
        /*
         * Órdenes de Compra
         */
        $monedas = $this->monedas_model->gets();
        foreach ($monedas as $key => $value) {
            $data['ocs'][] = $this->ots_model->gets_ocs_asociadas_por_monedas($data['numeroserie']['idot'], $value['idmoneda']);
        }
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('numeroserie/trazabilidad');
        $this->load->view('layout/footer');
    }
}
?>