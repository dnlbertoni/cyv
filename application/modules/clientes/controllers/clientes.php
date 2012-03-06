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
    Template::set_block('novedades', 'clientes/_novedades');    
    Template::set($data);
    Template::render();
  }
  function add(){
    $data['cliente']=(object) array( 
                            'id'=>'',
                            'apellido'=>'',
                            'nombre'=>'',
                            'telefono'=>'',
                            'direccion'=>'',
                            'email'=>'',
                            'fecnac'=>'',
                            'sexo'=>'F'
                          );
    $data['accion']='clientes/addDo';
    $data['ocultos']=array('id'=>'');
    Template::set_view('clientes/ver');
    Template::set($data);
    Template::render();
  }
  function addDo(){
    $fecnac=explode("/",$this->input->post('fecnac'));
    $datos=array( 'apellido'=>strtoupper($this->input->post('apellido')),
                  'nombre'=>strtoupper($this->input->post('nombre')),
                  'telefono'=>$this->input->post('telefono'),
                  'direccion'=>strtoupper($this->input->post('direccion')),
                  'email'=>strtolower($this->input->post('email')),
                  'fecnac'=>$fecnac[2].'-'.$fecnac[1].'-'.$fecnac[0],
                  'sexo'=>$this->input->post('sexo')
                  );
    $id=$this->Clientes_model->add($datos);
    Template::redirect('clientes/');
  }
  function editar($id){
    $data['cliente']=$this->Clientes_model->getbyId($id);
    $data['accion']='clientes/editarDo';
    $data['ocultos']=array('id'=>$id);
    Template::set_view('clientes/ver');
    Template::set($data);
    Template::render();    
  }
  function editarDo(){
    $fecnac=explode("/",$this->input->post('fecnac'));
    $datos=array( 'apellido'=>strtoupper($this->input->post('apellido')),
                  'nombre'=>strtoupper($this->input->post('nombre')),
                  'telefono'=>$this->input->post('telefono'),
                  'direccion'=>strtoupper($this->input->post('direccion')),
                  'email'=>strtolower($this->input->post('email')),
                  'fecnac'=>$fecnac[2].'-'.$fecnac[1].'-'.$fecnac[0],
                  'sexo'=>$this->input->post('sexo')
                  );
    $this->Clientes_model->update($datos,$this->input->post('id'));
    Template::redirect('clientes/');
  }
  function borrar($id){
    $data['cliente']=$this->Clientes_model->getbyId($id);
    $data['accion']='clientes/borrarDo';
    $data['ocultos']=array('id'=>$id);
    Template::set_view('clientes/ver');
    Template::set($data);
    Template::render();    
  }  
  function BorrarDo(){
    $fecnac=explode("/",$this->input->post('fecnac'));
    $datos=array( 'apellido'=>strtoupper($this->input->post('apellido')),
                  'nombre'=>strtoupper($this->input->post('nombre')),
                  'telefono'=>$this->input->post('telefono'),
                  'direccion'=>strtoupper($this->input->post('direccion')),
                  'email'=>strtolower($this->input->post('email')),
                  'fecnac'=>$fecnac[2].'-'.$fecnac[1].'-'.$fecnac[0],
                  'sexo'=>$this->input->post('sexo')
                  );
    $this->Clientes_model->borrar($this->input->post('id'));
    Template::redirect('clientes/');
  }  
}

