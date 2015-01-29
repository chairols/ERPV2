<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class R_session {
    
    public function check($datos) {
        if(count($datos) < 6) {
            redirect('/usuarios/login/', 'refresh');
        }
        
    }
}
?>
