<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf_oc extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image('assets/img/logo.jpg',12,7,10);
            
            $this->SetXY(5, 2);
            $this->SetFont('Arial', 'B', '20');
            $this->Cell(120, 20, 'ROLLER SERVICE S.A.', 0, 0, 'C');
            
            $this->SetXY(0, 24);
            $this->Cell(0, 0, 'Orden de Compra', 0, 0, 'C');
            
            $this->SetXY(12, 35);
            $this->SetFont('Arial', '', 8);
            $this->Cell(0, 0, 'Avenida Caseros 3217 - Buenos Aires - Argentina');
            
            $this->SetXY(12, 39);
            $this->Cell(0, 0, utf8_decode('Teléfono - FAX: +54 11 4912-1100 / Líneas Rotativas'));
            
            $this->SetXY(12, 43);
            $this->Cell(0, 0, utf8_decode('web: www.rollerservice.com.ar'));
            
            $this->SetXY(12, 47);
            $this->Cell(0, 0, 'email: ventas@rollerservice.com.ar');
            
            // Recuadro impositivo
            $this->SetXY(150, 39);
            $this->Cell(0, 0, 'CUIT: 33-64765677-9');
            
            $this->SetXY(150, 43);
            $this->Cell(0, 0, 'IIBB: 901-963789-5');
            
            $this->SetXY(150, 47);
            $this->Cell(0, 0, 'IVA: Responsable Inscripto');
            
            $this->Line(10, 52, 200, 52);
            
            $this->Ln(10);
            

            /*
             *  Comienzo Cuadro de la Página
             */
            $this->SetLineWidth(0.5);
            $this->Line(10, 5, 200, 5);
            $this->Line(10, 280, 200, 280);
            $this->Line(10, 5, 10, 280);
            $this->Line(200, 5, 200, 280);
            /*
             *  Fin Cuadro de la Página
             */
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>