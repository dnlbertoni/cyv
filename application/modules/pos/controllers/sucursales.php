<?php
/**
 * Description of sucursales
 *
 * @author dnl
 */
class Sucursales extends MY_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('Sucursales_model');
  }
  function index(){
    $data['sucursales']=$this->Sucursales_model->getAll();
    Template::set($data);
    Template::render();
  }
  function add(){
    $sucursal = array('nombre'=>'', 'direccion'=>'');
    $fechoy = new DateTime();
    $data['fecha']=$fechoy->format('M d, Y');
    $data['sucursal']= (object) $sucursal;
    $data['ocultos']=array();
    $data['accion']='pos/sucursales/addDo';
    Template::set($data);
    Template::set_block('formulario', 'pos/sucursales/view');
    Template::render();
  }
  function addDo(){
    foreach($_POST as $key=>$valor){
      $datos[$key]=$valor;
    }
    $id=$this->Sucursales_model->add($datos);
    Template::redirect('pos/sucursales/');
  }
  function edit($id){
    $sucursal = $this->Sucursales_model->getById($id);
    //$fechoy = new DateTime();
    //$data['fecha']=$fechoy->format('M d, Y');
    $data['fecha']='Nov 18, 2011';
    $data['sucursal']= (object) $sucursal;
    $data['accion']='pos/sucursales/editDo';
    $data['ocultos']=array('id'=>$sucursal->id);
    Template::set($data);
    Template::set_block('formulario', 'pos/sucursales/view');
    Template::render();
  }
  function editDo(){
    foreach ($_POST as $key => $valor) {
      if($key!='id'){
        $datos[$key]=$valor;
      }
    }
    $this->Sucursales_model->update($datos,$this->input->post('id'));
    Template::redirect('pos/sucursales');
  }
  function borrar($id){
    $this->Sucursales_model->borrar($id);
    Template::redirect('pos/sucursales');
  }
}
