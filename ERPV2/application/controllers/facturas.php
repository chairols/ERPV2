<?php

class Facturas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'r_session',
            'wsfe'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        $data['title'] = 'Listar Facturas';
        $data['session'] = $session;
        $data['segmento'] = $this->uri->segment(1);
        $data['menu'] = $this->r_session->get_menu();
        
        
        
        $wsfe = new Wsfe();
        $wsfe->CUIT = floatval(33647656779);
        $wsfe->setURL("https://wswhomo.afip.gov.ar/wsfev1/service.asmx");
        
        $PtoVta = 3;
        $TipoComp = 1;
        $NumeroFacturaDesde = 8;
        $certificado = APPPATH.'../upload/afip/hernan.crt';
        $clave = APPPATH.'../upload/afip/hernan.privada';
        $urlWsaa = "https://wsaahomo.afip.gov.ar/ws/services/LoginCms";
        
        
        if($wsfe->Login($certificado, $clave, $urlWsaa)) {
            if (!$wsfe->RecuperaLastCMP($PtoVta, $TipoComp)) {
                echo $wsfe->ErrorDesc;
            } else {
                $data['ultimo'] = $wsfe->getUltimoComprobanteAutorizado($PtoVta, $TipoComp);
                $data['factura'] = $wsfe->getDatosFactura($TipoComp, $PtoVta, $NumeroFacturaDesde);
                $data['wsfe'] = $wsfe;
                $data['prueba'] = $wsfe->FEParamGet();
            }
        }
        
        
        
       
        $this->load->view('layout_lte/header', $data);
        $this->load->view('layout_lte/menu');
        $this->load->view('facturas/index', $data);
        $this->load->view('layout_lte/footer');
    }
}
?>