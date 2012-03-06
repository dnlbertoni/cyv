<?php
/**
 * Administrador de Impresiones
 *
 * @author dnl
 */
class Pdf extends MY_Controller{
  function __construct() {
    parent::__construct();
    $this->load->library('fpdf');
  }
  function listaPrecios(){
    $this->load->model('Articulos_model');
    $articulos=$this->Articulos_model->getAll();
    $this->fpdf->Open();
    $this->fpdf->SetMargins(30,0,0);
    $this->fpdf->SetAutoPageBreak(true);
    $this->fpdf->SetDrawColor(128);
    $this->fpdf->SetFillColor(128);
    $this->fpdf->SetTopMargin(5);    
    $renglon=0;
    $hoja=1;
    $hojaAux=0;
    $total=0;
    $canFin = count($articulos);
    $can=0;
    foreach($articulos as $articulo){
      if($hoja!=$hojaAux){
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Times','', 14);    
        $this->fpdf->Cell(105,6,"Cacao & Vainilla",0,0);
		$texto = sprintf("Fecha ");
        $this->fpdf->Cell(105,6,$texto,0,1);
        $this->fpdf->Ln(3);
        $this->fpdf->SetFont('Times','', 10); 
        $this->fpdf->Cell(20,6,"Codigo",1,0,'C',true);
        $this->fpdf->Cell(80,6,"Articulo",1,0,'C',true);
        $this->fpdf->Cell(20,6,"Precio",1,0,"C",true);
        $this->fpdf->Cell(20,6,"Publico",1,1,"C",true);
        $hojaAux=$hoja;
      };
      $this->fpdf->Cell(20,6,sprintf("%04.0f",$articulo->id),1,0,'R');
      $this->fpdf->Cell(80,6,substr($articulo->nombre,0,40),1,0,'L');
      $this->fpdf->Cell(20,6,sprintf("$%4.2f",$articulo->precio),1,0,'R');
      $this->fpdf->Cell(20,6,sprintf("$%4.2f",$articulo->publico),1,1,'R');
      //$this->fpdf->Cell(5,6,$renglon,1,1);
      $renglon++;
      $can++;
      if($renglon>33){
        $hoja++;
        $renglon=0;
      };
    };
    $file = TMP .'listado.pdf';
    $this->fpdf->AutoPrint(false);
    $this->fpdf->Output( $file,'I');
    Template::redirect('articulos');
  }
}
