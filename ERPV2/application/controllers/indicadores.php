<?php

class Indicadores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session'
        ));
        
        $this->r_session->check($this->session->all_userdata());
    }
    
    public function index() {
        
    }
}
?>