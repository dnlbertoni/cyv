<?php

/**
 * Description of articulos
 *
 * @author dnl
 * @uses Articulos_model
 */
class Articulos extends MY_Controller{
  function __construct() {
    parent::__construct();
    if(!$this->tank_auth->is_logged_in()){
      Template::redirect('auth/login');
    }
    $this->load->model('Articulos_model','',true);
  }
  /**
   * listo todos los articulos
   */
  function index(){
    $data['articulos']=$this->Articulos_model->getAll();
    Template::set_block('novedades', 'articulos/_novedades');
    Template::set($data);
    Template::render();
  }
  /**
   * creo articulo nuevo
   */
  function nuevo(){
    $articulo = array( 'nombre'=>'',
                       'costo'=>0,
                       'peso'=>0,
                       'kg'=>1,
                       'precio'=>0,
                       'estado'=>1
    );
    $fechoy = new DateTime();
    $data['fecha']=$fechoy->format('M d, Y');
    $data['articulo']= (object) $articulo;
    $data['accion']='articulos/nuevoDo';
    $data['ocultos']=array('accion'=>'add', 'users_id'=>$this->session->userdata('user_id'));
    Template::set($data);
    Template::set_block('nuevo', 'articulos/view');
    Template::render();
  }
  /**
   * graba en la tabla el articulo
   */
  function nuevoDo(){
    foreach($_POST as $key=>$valor){
      if(!preg_match('/(accion)/', $key)){
        $datos[$key]=$valor;
      };
    };
    $idArticulo = $this->Articulos_model->add($datos);
    Template::redirect('articulos/ver/'.$idArticulo);
  }
  /**
   * Editar articulo
   * @param integer $id codigo articulo
   */
  function editar($id){
    $data['articulo'] = $this->Articulos_model->getById($id);
    $fechoy = new DateTime();
    $data['fecha']=$fechoy->format('M d, Y');
    $data['accion']='articulos/editarDo';
    $data['ocultos']=array('accion'=>'edit','id'=>$id , 'users_id'=>$this->session->userdata('user_id'));
    Template::set($data);
    Template::set_block('nuevo', 'articulos/view');
    Template::render();            
  }
  /**
   * graba en la tabla las modificaciones hechas a un articulo
   * 
   */
  function editarDo(){
    foreach($_POST as $key=>$valor){
      if(!preg_match('/(accion)|^[id]/', $key)){
        $datos[$key]=$valor;
      };
    };
    $this->Articulos_model->update($datos,$this->input->post('id'));
    Template::redirect('articulos/index');
  }
  /**
   * Muestra los datos del articulo cargado por el id
   * 
   * @param integer $id codigo articulo
   */
  function ver($id){
    $data['articulo'] = $this->Articulos_model->getById($id);
    $fechoy = new DateTime();
    $data['fecha']=$fechoy->format('M d, Y');
    $data['accion']='';
    $data['ocultos']=array('accion'=>'view');
    Template::set($data);
    Template::set_block('nuevo', 'articulos/view');
    Template::render();      
  }
  /**
   * borrar
   * @param integer $id codigo articulo
   */
  function borrar($id){
    $this->Articulos_model->borrar($id);
    $this->index();
  }
}
