<?php
/**
 * Description of insumos
 *
 * @author dnl
 */
class Insumos extends MY_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('Insumos_model');
    Template::set_block('fast', 'insumos/_fast');
    Template::set_block('novedades', 'insumos/_novedades');
  }
  function index(){
    $data['insumos']=$this->Insumos_model->getAll();
    Template::set($data);
    Template::render();
  }
  function add(){
    $data['insumo']=(object) array('id'=>'','nombre'=>'', 'stock'=>0, 'stockMin'=>0, 'estado'=>1);
    $data['accion']='insumos/addDo';
    $data['ocultos']=array('id'=>'');
    Template::set($data);
    Template::set_view('insumos/ver');
    Template::render();
  }
  function addDo(){
    $datos = array( 'nombre'     => strtoupper($this->input->post('nombre')), 
                    'stock'      => $this->input->post('stock'),
                    'stockMin'   => $this->input->post('stockMin'), 
                    'estado'     => $this->input->post('estado'), 
                    'created_at' => 'NOW()'
    );
    $id=$this->Insumos_model->add($datos);
    Template::redirect('insumos/');
  }
  function editar($id){
    $insumo = $this->Insumos_model->getById($id);
    $data['insumo']=$insumo;
    $data['accion']='insumos/editarDo';
    $data['ocultos']=array('id'=>$insumo->id,'stock'=>$insumo->stock);
    Template::set($data);
    Template::set_view('insumos/ver');
    Template::render();
  }
  function editarDo(){
    $datos = array( 'nombre'     => strtoupper($this->input->post('nombre')), 
                    'stock'      => $this->input->post('stock'),
                    'stockMin'   => $this->input->post('stockMin'), 
                    'estado'     => $this->input->post('estado'), 
    );
    $this->Insumos_model->update($datos, $this->input->post('id'));
    Template::redirect('insumos/');
  }  
  function borrar($id){
    $insumo = $this->Insumos_model->getById($id);
    $data['insumo']=$insumo;
    $data['accion']='insumos/borrarDo';
    $data['ocultos']=array('id'=>$insumo->id);
    Template::set($data);
    Template::set_view('insumos/ver');
    Template::render();
  }
  function borrarDo(){
    $this->Insumos_model->borrar($this->input->post('id'));
    Template::redirect('insumos');
  }
  
}
