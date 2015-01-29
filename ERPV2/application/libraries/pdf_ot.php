<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf_ot extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image('assets/img/logo.jpg',30,9,22);
            $this->SetFont('Arial','B',30);
            $this->Cell(65);
            $this->Cell(120,20,'CARATULA O.T.',0,0,'C');
            $this->Ln('5');
           
            
            $this->SetLineWidth(1);
            $this->Line(10, 5, 200, 5);
            $this->Line(10, 35, 200, 35);
            $this->Line(10, 5, 10, 35);
            $this->Line(200, 5, 200, 35);
            $this->Line(70, 5, 70, 35);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>