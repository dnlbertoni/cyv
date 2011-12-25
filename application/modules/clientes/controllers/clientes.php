<?php
/**
 * Description of clientes
 *
 * @author dnl
 */
class Clientes extends MY_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('Clientes_model');
  }
  function index(){
    $clientes = $this->Clientes_model->getAll();
    $data['clientes']=$clientes;
    Template::set($data);
    Template::render();
  }
}

