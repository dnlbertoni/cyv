<?php
/**
 * Description of clientes_model
 *
 * @author dnl
 */
class Clientes_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('clientes');
  }
}
