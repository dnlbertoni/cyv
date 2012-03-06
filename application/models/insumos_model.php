<?php
/**
 * Description of insumos_model
 *
 * @author dnl
 */
class Insumos_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('insumos');
  }
}