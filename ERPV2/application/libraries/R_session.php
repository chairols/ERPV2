<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class R_session {
    
    public function check($datos) {
        if(count($datos) < 6) {
            redirect('/usuarios/login/', 'refresh');
        }
        
        $this->comprobar_accesos();
    }
    
    private function comprobar_accesos() {
        $this->CI =& get_instance();
        $this->CI->load->library(array(
            'session'
        ));
        $this->CI->load->helper(array(
            'url'
        ));
        $this->CI->load->model(array(
            'menu_model'
        ));
        
        $session = $this->CI->session->all_userdata();
        // $session['tipo_usuario']
        
        $string = '/'.$this->CI->uri->segment(1).'/';
        if($this->CI->uri->segment(2))
            $string .= $this->CI->uri->segment(2).'/';
        
        
        $acceso = $this->CI->menu_model->get_rol_menu($session['tipo_usuario'], $string);
        
        if(!isset($acceso[0]['idmenu'])) {
            show_404();
        }
    }
    
    public function get_menu() {
        $this->CI =& get_instance();
        $this->CI->load->model(array(
            'menu_model'
        ));
        $this->CI->load->helper(array(
            'url'
        ));
        
        $string = '/'.$this->CI->uri->segment(1).'/';
        if($this->CI->uri->segment(2))
            $string .= $this->CI->uri->segment(2).'/';
        
        $data['menu'] = $this->CI->menu_model->obtener_menu_por_padre(0);
        foreach ($data['menu'] as $key => $value) {
            $data['menu'][$key]['submenu'] = $this->CI->menu_model->obtener_menu_por_padre($value['idmenu']);
            if($value['href'] == $string) {
                $data['menu'][$key]['active'] = true;
            } else {
                $data['menu'][$key]['active'] = false;
            }
        }
        
        return $data;
    }
}
?>
