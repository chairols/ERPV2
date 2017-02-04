<?php

class irm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'form_validation',
            'beans'
        ));
        $this->load->model(array(
            'irm_model',
            'controles_model',
            'proveedores_model',
            'ocs_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Listar Informes de Recepción de Materiales';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['irms'] = $this->irm_model->gets();
        foreach ($data['irms'] as $key => $value) {
            $data['irms'][$key]['controles'] = $this->irm_model->gets_controles_por_idirm_item($value['idirm_item']);
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('irm/index');
        $this->load->view('layout_lte/footer');
        
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Informe de Recepción de Materiales';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'idproveedor' => $this->input->post('proveedor'),
                'idusuario' => $session['SID']
            );
            
            $idirm = $this->irm_model->set($datos);
            
            redirect('/irm/agregar_items/'.$idirm.'/', 'refresh');
        }
        
        $data['proveedores'] = $this->irm_model->gets_proveedores_con_irm_pendientes();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu');
        $this->load->view('irm/agregar');
        $this->load->view('layout/footer');
    }
    
    public function pendientes() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Materiales Pendientes de Recepción';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['pendientes'] = $this->irm_model->gets_pendientes_de_recepcion();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('irm/pendientes');
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar_items($idirm = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar IRM';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        if($idirm == null) {
            redirect('/irm/', 'refresh');
        }
        
        $this->form_validation->set_rules('pendienteirm', 'Artículo', 'required');
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            /*
             * Guardar en irm_items
             */
            $where = array(
                'idpendienteirm' => $this->input->post('pendienteirm')
            );
            $pendienteirm = $this->irm_model->get_where_pendienteirm($where);
            
            $datos = array(
                'idirm' => $idirm,
                'idoc_item' => $pendienteirm['idoc_item'],
                'cantidad' => $this->input->post('cantidad'),
                'idusuario' => $session['SID']
            );
            
            $config['upload_path'] = "./upload/certificados/";
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = true;
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);
            $adjunto = null;

            if(!$this->upload->do_upload('certificado')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $adjunto = array('upload_data' => $this->upload->data());
            }

            if($adjunto != null) {
                $datos['certificado'] = '/upload/certificados/'.$adjunto['upload_data']['file_name'];
            }
            $post = $this->input->post();
            $controles = array();
            foreach ($post as $key => $value) {
                $array = explode('-', $key);
                if($array[0] == 'control') {
                    $controles[] = $array[1];
                }
            }
            
            /*
             *  Si hay controles
             */
            if(count($controles)) {
                $idirm_item = $this->irm_model->set_irm_item($datos);
                
                /*
                 * Agrego controles
                 */
                foreach($controles as $control) {
                    $datos = array(
                        'idirm_item' => $idirm_item,
                        'idcontrol' => $control
                    );
                    $this->irm_model->set_irm_item_control($datos);
                }
                /*
                 *  Modificar los pendientes
                 */
                $update = array(
                    'cantidadpendiente' => $pendienteirm['cantidadpendiente']-$this->input->post('cantidad'),
                    'cantidadrecepcionado' => $this->input->post('cantidad')
                );
                if($pendienteirm['cantidadpendiente'] <= $this->input->post('cantidad')) {
                    $update['pendiente'] = 0;
                }
                $this->irm_model->update_pendientesirm($update, $this->input->post('pendienteirm'));
            } else { 
                /*
                 *  Poner alerta de que no existen controles
                 */
            }
            

            
        }
        
        $data['irm'] = new IrmBean();
        $data['irm']->setId($idirm);
        $data['irm']->armarIRMporID();
        
        
        $data['items'] = $this->irm_model->gets_items_pendientes_por_proveedor($data['irm']->getProveedor()->getId());
        
        $data['controles'] = $this->controles_model->gets();
        
        $this->load->view('layout/header_form', $data);
        $this->load->view('layout/menu');
        $this->load->view('irm/agregar_items');
        $this->load->view('layout/footer_form');
    }
    
    public function cantidad($idpendienteirm) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idpendienteirm != 'null') {
            $where = array(
                'idpendienteirm' => $idpendienteirm
            );

            $data['pendienteirm'] = $this->irm_model->get_where_pendienteirm($where);
            
            $this->load->view('irm/cantidad', $data);
        } 
        
    }
    
    public function unidaddemedida($idpendienteirm) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        
        
        if($idpendienteirm != 'null') {
            $where = array(
                'idpendienteirm' => $idpendienteirm
            );
            $pendienteirm = $this->irm_model->get_where_pendienteirm($where);

            $datos = array(
                'idoc_item' => $pendienteirm['idoc_item']
            );
            $oc_item = $this->ocs_model->get_item_where($datos);

            $data['um'] = new UnidadesDeMedidaBean();
            $data['um']->setId($oc_item['idmedida']);
            $data['um']->armarUnidadDeMedidaPorID();

            $this->load->view('irm/unidaddemedida', $data);
        }
    }
    
    public function ots($idpendienteirm) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        
        if($idpendienteirm != 'null') {
            $where = array(
                'idpendienteirm' => $idpendienteirm
            );

            $pendienteirm = $this->irm_model->get_where_pendienteirm($where);

            $datos = array(
                'idoc_item' => $pendienteirm['idoc_item']
            );
            $oc_item = $this->ocs_model->get_item_where($datos);

            $data['ots'] = $this->ocs_model->gets_ots_asociadas($oc_item['idoc_item']);

            $this->load->view('irm/ots', $data);
        }
    }
}
?>