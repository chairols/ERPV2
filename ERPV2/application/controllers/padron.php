<?php

class Padron extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'padron_model',
            'proveedores_model'
        ));
    }
    
    public function q() {
        
        if($this->input->get('cuit') != null) {
            //var_dump($this->input->get('cuit'));
            
            $res = $this->padron_model->get_where($this->input->get('cuit'));
            echo json_encode($res);
        } else {
            $res = array(
                'error' => 'No hay variable de inicialización'
            );
            echo json_encode($res);
        }
    }
    
    public function proveedor($idproveedor = null) {
        if($idproveedor != null) {
            $resultadoproveedor = $this->proveedores_model->get_where(array('idproveedor' => $idproveedor));
            $resultadopadron = $this->padron_model->get_where_exacto($resultadoproveedor['cuit']);
            
            if(isset($resultadopadron[0]['porcentaje'])) {
                echo "<input class='span12' type='text' value='".$resultadopadron[0]['porcentaje']."' name='porcentaje' required>";
                echo "<br>";
                echo "Desde: ".$resultadopadron[0]['desde']." - Hasta: ".$resultadopadron[0]['hasta'];
            } else {
                echo "<input class='span12' type='text' name='porcentaje' required>";
            }
            
        }
    }
}
?>