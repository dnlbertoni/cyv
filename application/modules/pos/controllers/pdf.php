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
  function imprimoComprobante($idencab=false){
    $idencab=($idencab)?$idencab:$this->input->post('idencab');
	$this->load->model('Facmovim_model');
    $articulos=$this->Facmovim_model->getComprobante($idencab);
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
        $this->fpdf->Cell(0,10,"DOCUMENTO NO VALIDO COMO FACTURA",0,1,'C');
        $this->fpdf->Cell(105,6,"Cacao & Vainilla",0,0);
		$texto = sprintf("Fecha %s",$articulo->fecha);
        $this->fpdf->Cell(105,6,$texto,0,1);
		$texto = sprintf("Sucursal %s",$articulo->sucursal_id);
        $this->fpdf->Cell(105,6,$texto,0,0);
		$texto = sprintf("%s-%s",$articulo->puesto,$articulo->numero);
        $this->fpdf->Cell(105,6,$texto,0,1);
        $this->fpdf->Ln(1);
        $this->fpdf->SetFont('Times','', 10); 
        $this->fpdf->Cell(20,6,"Cant.",1,0,'C',true);
        $this->fpdf->Cell(80,6,"Articulo",1,0,'C',true);
        $this->fpdf->Cell(20,6,"Precio",1,0,"C",true);
        $this->fpdf->Cell(20,6,"Importe",1,1,"C",true);
        if($hoja!=1){
          $this->fpdf->Cell(120,6,"TRANSPORTE",1,0,"L");
          $this->fpdf->Cell(20,6,sprintf("$%5.2f",$total),1,1,"R");                
        }
        $hojaAux=$hoja;
      };
      $this->fpdf->Cell(20,6,sprintf("%02.2f Kg.",$articulo->cantidad),1,0,'R');
      $this->fpdf->Cell(80,6,substr($articulo->articulo_nombre,0,40),1,0,'L');
      $this->fpdf->Cell(20,6,sprintf("$%4.2f",$articulo->precio),1,0,'R');
      $this->fpdf->Cell(20,6,sprintf("$%4.2f",$articulo->precio * $articulo->cantidad),1,1,'R');
      //$this->fpdf->Cell(5,6,$renglon,1,1);
      $renglon++;
      $can++;
      $total += $articulo->precio * $articulo->cantidad;
      if($renglon>16){
        $hoja++;
        $renglon=0;
        if($can<$canFin){
          $this->fpdf->Cell(120,6,"TRANSPORTE",1,0,"L");
          $this->fpdf->Cell(20,6,sprintf("$%5.2f",$total),1,1,"R");                
        };
      };
    };
    $this->fpdf->Cell(120,6,"TOTAL",1,0,"L");
    $this->fpdf->Cell(20,6,sprintf("$%5.2f",$total),1,1,"R");                
    $file = TMP .'remito.pdf';
    //$this->fpdf->AutoPrint(false);
    $this->fpdf->Output( $file,'I');
  }
}
