<?php
/**
 * Description of inicio
 *
 * @author dnl
 */
class Inicio extends MY_Controller{
  function __construct() {
    parent::__construct();
    if(!$this->tank_auth->is_logged_in()){
      Template::redirect('auth/login');
    }
  }
  function index(){
    Template::render();
  }
}
