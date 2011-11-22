<?php

/**
 * Controlador de todo lo referente a la facturacion
 *
 * @author dnl
 * @category P.O.S. (point of sale)
 */
class Pos extends MY_Controller{
  /**
   * funcion constructor aca se inicializa lo siguiente:
   * @var integer $puesto puesto con el que sale el comprobante 
   * 
   */
  private $puesto;
  function __construct() {
    parent::__construct();

    $this->puesto = PUESTO;
    $this->load->model('Sucursales_model');
  }
  /**
   * Pantalla de inicio de facturacion
   */
  function index(){
    $data['sucursales']=$this->Sucursales_model->getAll();
    Template::set_block('novedades', 'pos/_novedades');
    Template::set($data);
    Template::render();
  }
  function pedido($sucId=1){
    $fechoy= new DateTime();
    $data['fecha']=$fechoy->format(" d/m/Y");
    $suc=$this->Sucursales_model->getById($sucId);
    $data['sucursal']="$suc->nombre";
    $data['sucId']=$sucId;
    $numero =2;
    $data['comprobante']=sprintf("%04.0f-%08.0f", $this->puesto, $numero);
    $data['puesto']=$this->puesto;
    $data['numero']=$numero;
    $data['pagina']=base_url().'/index.php/pos/addArticulo';
    $data['paginaDet']="'".base_url().'/index.php/pos/muestroDetalle'."'";
    $data['paginaDel']="'".base_url().'/index.php/pos/vacioTMP'."'";
    $data['ocultos']=array('fecha'=>$fechoy->format(" d/m/Y"));
    Template::set($data);
    Template::render();
  }
  function addArticulo(){
    $this->load->model('Articulos_model');
    $this->load->model('Tmpmovim_model');
    $articulo = $this->Articulos_model->getById($this->input->post('articulo'));
    $datos['puesto']=$this->input->post('puesto');
    $datos['sucursal']=$this->input->post('sucursal');
    $datos['cantidad']=$this->input->post('cantidad')*$articulo->kg;
    $datos['articulo']=$this->input->post('articulo');
    $datos['precio']=$articulo->precio;
    $id=$this->Tmpmovim_model->add($datos);
    $this->muestroDetalle($this->input->post('puesto'),$this->input->post('sucursal'));
  }
  function muestroDetalle($puesto=false, $sucursal=false){
    $puesto=($puesto)?$puesto:$this->input->post('puesto');
    $sucursal=($sucursal)?$sucursal:$this->input->post('sucursal');
    $this->load->model('Tmpmovim_model');
    $articulos=$this->Tmpmovim_model->getDetalle($puesto,$sucursal);
    $data['articulos']=$articulos;
    $this->load->view('pos/movimientos', $data);
  }
  function vacioTMP($puesto=false,$sucursal=false){
    $puesto=($puesto)?$puesto:$this->input->post('puesto');
    $sucursal=($sucursal)?$sucursal:$this->input->post('sucursal');
    $this->load->model('Tmpmovim_model');
    $articulos=$this->Tmpmovim_model->vacioTemporal($puesto,$sucursal);
    $data['articulos']=array();
    $this->load->view('pos/movimientos', $data);
  }
}

