<?php

class Fabricas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session',
            'r_session',
            'beans'
        ));
        $this->load->model(array(
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
        $data['title'] = 'Listar Fábricas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        $data['fabricas'] = $this->fabricas_model->gets();
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('fabricas/index', $data);
        $this->load->view('layout_lte/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        $data['title'] = 'Agregar Fábrica';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe la fábrica repetida
        
        $this->form_validation->set_rules('fabrica', 'Fábrica', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
        $this->form_validation->set_rules('localidad', 'Localidad', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'fabrica' => $this->input->post('fabrica')
            );
            $resultado = $this->fabricas_model->get_where($datos);
                    
            if(count($resultado) == 0) {
                $datos = array(
                    'fabrica' => $this->input->post('fabrica'),
                    'direccion' => $this->input->post('direccion'),
                    'localidad' => $this->input->post('localidad'),
                    'telefono' => $this->input->post('telefono')
                );

               $id = $this->fabricas_model->set($datos); 
               
               $log = array(
                   'tabla' => 'fabricas',
                   'idtabla' => $id,
                   'texto' => 'Se agregó la fábrica '.$this->input->post('fabrica').'<br>'
                   . 'dirección: '.$this->input->post('direccion').'<br>'
                   . 'localidad: '.$this->input->post('localidad').'<br>'
                   . 'telefono: '.$this->input->post('telefono').'<br>',
                   'tipo' => 'add',
                   'idusuario' => $session['SID']
               );
               $this->log_model->set($log);
               
               redirect('/fabricas/', 'refresh');
            } else {
                $data['alerta'] = '<div class="alert alert-danger">La fábrica ya existe</div>';
            }
        }
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('fabricas/agregar');
        $this->load->view('layout_lte/footer');
    }
    
    public function modificar($idfabrica = null) {
        $session = $this->session->all_userdata();
        $this->r_session->check($session);
        if($idfabrica == null) {
            redirect('/fabricas/', 'refresh');
        }
        $data['title'] = 'Modificar Fábrica';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        $data['alerta'] = '';  // Se utiliza si existe la fábrica repetida
        
        $this->form_validation->set_rules('fabrica', 'Fábrica', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
        $this->form_validation->set_rules('localidad', 'Localidad', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'fabrica' => $this->input->post('fabrica'),
                'direccion' => $this->input->post('direccion'),
                'localidad' => $this->input->post('localidad'),
                'telefono' => $this->input->post('telefono')
            );
            
            $this->fabricas_model->update($datos, $idfabrica);
            
            $log = array(
                'tabla' => 'fabricas',
                'idtabla' => $idfabrica,
                'texto' => 'Se modificó la fábrica '.$this->input->post('fabrica').'<br>'
                . 'dirección: '.$this->input->post('direccion').'<br>'
                . 'localidad: '.$this->input->post('localidad').'<br>'
                . 'telefono: '.$this->input->post('telefono').'<br>',
                'tipo' => 'edit',
                'idusuario' => $session['SID']
            );
            $this->log_model->set($log);

            redirect('/fabricas/', 'refresh');
        }
        
        
        $datos = array(
            'idfabrica' => $idfabrica
        );
        $data['fabrica'] = $this->fabricas_model->get_where($datos);
        
        $fabrica = new FabricasBean();
        $fabrica->setId($idfabrica);
        $fabrica->armarFabricaPorID();
        
        /*
        echo "<br><br><br><pre>";
        print_r($fabrica);
        echo "</pre>";
        */
        
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('fabricas/modificar');
        $this->load->view('layout_lte/footer');
    }
}
?>