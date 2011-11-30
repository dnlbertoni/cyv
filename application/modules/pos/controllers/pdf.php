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
  function imprimoComprobante($puesto=false, $sucursal=false){
    $puesto=($puesto)?$puesto:$this->input->post('puesto');
    $sucursal=($sucursal)?$sucursal:$this->input->post('sucursal');
    $this->load->model('Tmpmovim_model');
    $articulos=$this->Tmpmovim_model->getDetalle($puesto,$sucursal);
    $data['articulos']=$articulos;
    $this->fpdf->Open();
    $this->fpdf->SetMargins(0,0,0);
    $this->fpdf->SetAutoPageBreak(true);
    $this->fpdf->SetDrawColor(128);
    $this->fpdf->SetTopMargin(-80);    
    $this->fpdf->AddPage('P',array(75,215));
    $this->fpdf->SetFont('Times','', 12);    
    $this->fpdf->SetXY(0,0);    
    for($i=0;$i<40;$i++){
        $this->fpdf->Cell(10,10,'prueba  ' .$i,0,1,'J');
    }
    $file = TMP .'remito.pdf';
    $this->fpdf->AutoPrint(false);
    $this->fpdf->Output( $file,'I');
  }
}
