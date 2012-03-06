<?php
/**
 * Description of ctacte
 *
 * @author dnl
 */
class Ctacte extends MY_Controller{
  function __construct() {
    parent::__construct();
  }
  function index(){
    Template::render();
  }
  function pendientes($suc){
    $this->load->model('Facencab_model');
    $listado = $this->Facencab_model->pendientesCobro($suc);
    $data['facturas'] =$listado;
    Template::set($data);
    Template::render();
  }
}
