<?php
/**
 * Description of insumos
 *
 * @author dnl
 */
class Insumos extends MY_Controller{
  function __construct() {
    parent::__construct();
  }
  function index(){
    Template::render();
  }
}
