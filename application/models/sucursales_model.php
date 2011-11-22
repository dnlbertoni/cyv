<?php
/**
 * Description of sucursales_model
 *
 * @author dnl
 */
class Sucursales_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('sucursales');
  }
}
